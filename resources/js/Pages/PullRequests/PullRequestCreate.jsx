import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';

export default function PullRequestCreate({ auth, pullRequests }) {
    const { data, setData, post, processing, errors } = useForm({
        link: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('pull-requests.store'));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Create a pull request
                </h2>
            }
        >
            <Head title="Repository" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                        <form onSubmit={submit}>
                            <div>
                                <InputLabel htmlFor="link" value="Pull request url" />

                                <TextInput
                                    id="link"
                                    type="url"
                                    name="link"
                                    value={data.link}
                                    className="mt-1 block w-full"
                                    onChange={(e) => setData('link', e.target.value)}
                                    required
                                />

                                <InputError message={errors.link} className="mt-2" />
                            </div>

                            <PrimaryButton className="mt-4" disabled={processing}>
                                Create
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
