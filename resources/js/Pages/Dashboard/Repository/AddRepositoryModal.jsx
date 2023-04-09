import { useState } from 'react';
import GithubLogo from '@/../images/dashboard/github.svg';
import { router } from '@inertiajs/react';

export default function AddRepositoryModal({ repositories }) {
    const [actionLoading, setActionLoading] = useState(false);
    const providerLogos = { github: GithubLogo };

    const renderRepository = (repo, index) => {
        return (
            <div
                key={index}
                className="mt-5 flex items-center justify-between p-2 hover:text-slate-600 cursor-pointer"
                onClick={() => addRepository(repo)}
            >
                <div className="flex items-center justify-center gap-2">
                    <img
                        src={providerLogos[repo.provider]}
                        className="invert relative flex h-[20px] min-h-[20px] w-[20px] min-w-[20px"
                    />
                    <p className="text-base font-bold text-navy-700">{repo.name}</p>
                </div>
            </div>
        );
    };

    const addRepository = (repo) => {
        if (actionLoading) {
            return;
        }
        setActionLoading(true);
        router.post(route('dashboard.repository.store'), repo);
    };

    return (
        <div className="">
            <div className="relative flex flex-row justify-between">
                <div className="flex items-center">
                    <h4 className="ml-4 text-xl font-bold text-navy-700">Repositories</h4>
                </div>
            </div>

            <div className="h-96 w-full overflow-y-scroll">{repositories && repositories.map(renderRepository)}</div>
        </div>
    );
}
