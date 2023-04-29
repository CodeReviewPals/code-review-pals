import DashboardTable from '@/Components/Dashboard/Table';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import GithubLogo from '../../../images/dashboard/github.svg';
import { useState } from 'react';
import DashboardModal from '@/Components/Dashboard/Modal';
import AddRepositoryModal from './AddRepositoryModal';

export default function RepositoryIndex({ auth, repositories }) {
    const [thirdPartyModal, setThirdPartyModal] = useState({ active: false, provider: null });
    const [thirdPartyRepositories, setThirdPartyRepositories] = useState([]);

    const closeThirdPartyModal = () => {
        setThirdPartyModal({ active: false });
    };

    const rowRender = (data, index) => {
        return (
            <tr key={index}>
                <td className="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">
                    <div>
                        <h6 className="text-gray-500 dark:text-gray-400">{data.id}</h6>
                    </div>
                </td>
                <td className="px-12 py-4 text-sm text-center font-medium whitespace-nowrap">
                    <h6 className="text-gray-500 dark:text-gray-400">{data.full_name}</h6>
                </td>
                <td className="px-4 py-4 text-sm text-center whitespace-nowrap">
                    <div>
                        <p className="text-gray-500 dark:text-gray-400">{data.description}</p>
                    </div>
                </td>

                <td className="px-4 py-4 text-sm text-center whitespace-nowrap">
                    <p className="text-gray-500 dark:text-gray-400">{data.language}</p>
                </td>
                {/* Action */}
                <td className="px-4 py-4 text-sm text-center whitespace-nowrap">
                    {data.can.delete && (
                        <Link
                            href={route('repositories.destroy', data.id)}
                            method="delete"
                            className="text-red-600 hover:text-red-900"
                            as="button"
                        >
                            Delete
                        </Link>
                    )}
                </td>
            </tr>
        );
    };

    const addRepositoryFromThirdPartyButton = () => {
        return (
            <div onClick={githubRepositoryModal} className="flex items-center mt-4 gap-x-3">
                <button className="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                    <img className="h-6" src={GithubLogo} />
                    <span>Add Repository</span>
                </button>
            </div>
        );
    };

    const githubRepositoryModal = () => {
        setThirdPartyModal({
            active: true,
            provider: 'github',
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Repository{' '}
                    <span className="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                        {repositories.meta.total + (repositories.meta.total > 1 ? ' repositories' : ' repository')}
                    </span>
                </h2>
            }
        >
            <Head title="Repository" />

            <div className="py-12">
                <DashboardTable
                    tableData={repositories}
                    routePrefix="dashboard.repository"
                    rowRender={rowRender}
                    suffixName="Repository"
                    columnsTitle={['ID', 'Name', 'Description', 'Language', 'Actions']}
                    customAddButton={addRepositoryFromThirdPartyButton}
                />
            </div>
            {thirdPartyModal.active && (
                <DashboardModal
                    thirdPartyModal={thirdPartyModal}
                    closeThirdPartyModal={closeThirdPartyModal}
                >
                    <AddRepositoryModal
                        auth={auth}
                        provider={thirdPartyModal.provider}
                        closeThirdPartyModal={closeThirdPartyModal}
                        repositories={thirdPartyRepositories}
                        setRepositories={setThirdPartyRepositories}
                    />
                </DashboardModal>
            )}
        </AuthenticatedLayout>
    );
}
