import {useEffect, useState} from "react";
import GithubLogo from "../../../images/dashboard/github.svg";
import {useForm} from "@inertiajs/react";
import SecondaryButton from "@/Components/SecondaryButton";

export default function AddRepositoryModal({auth, provider, closeThirdPartyModal}) {
    const [repositories, setRepositories] = useState([]);

    const {data, setData, post} = useForm({
        nodeId: "",
        fullName: "",
        description: "",
        language: "",
        htmlUrl: "",
    })

    const providerLogos = {github: GithubLogo};

    const dataFetch = async () => {
        await axios
            .get(route('third-party-repositories.index', {
                    username: auth.user.name,
                    provider: provider,
                })
            )
            .then(response => setRepositories(response.data));
    };

    useEffect(() => {
        (async () => await dataFetch())();
    }, []);

    useEffect(() => {
        if (data.nodeId !== "") {
            addRepository();
        }
    }, [data]);

    const addRepository = () => {
        post(route('repositories.store'));

        closeThirdPartyModal();
    }

    const renderRepository = (repository) => {
        return (
            <div key={repository.nodeId}
                 className="mt-5 flex items-center justify-between p-2 hover:text-slate-600 cursor-pointer">
                <div className="flex items-center justify-center gap-2">
                    <img
                        src={providerLogos[provider]}
                        className="invert relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px"
                        alt={provider}/>
                    <p className="text-base font-bold text-navy-700">{repository.fullName}</p>
                </div>

                <SecondaryButton type="submit" onClick={() => setData(repository)}>
                    Add
                </SecondaryButton>
            </div>
        );
    };

    return (
        <div>
            <div className="relative flex flex-row justify-between">
                <div className="flex items-center">
                    <h4 className="ml-4 text-xl font-bold text-navy-700">Repositories</h4>
                </div>
            </div>

            {repositories.length > 0 &&
                <div className="h-96 w-full overflow-y-scroll">
                    {repositories.map(renderRepository)}
                </div>
            }
        </div>
    );
}
