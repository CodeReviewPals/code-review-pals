import DashboardTable from '@/Components/Dashboard/Table';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';
import GithubLogo from '@/../images/dashboard/github.svg';
import { useState } from 'react';
import DashboardModal from '@/Components/Dashboard/Modal';
import AddRepositoryModal from './AddRepositoryModal';

export default function Index({ auth, repositories, thirdParty }) {
    const [thirdPartyModal, setThirdPartyModal] = useState({
        active: thirdParty.active || false,
        provider: thirdParty.provider || null,
        dataLoaded: thirdParty.repositories.length > 0 || false,
    });
    const closeThirdPartyModal = () => {
        setThirdPartyModal({ ...thirdPartyModal, active: false });
    };
    const rowRender = (data, index) => {
        return (
            <tr key={index}>
                <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    <div>
                        <h6 className="text-gray-500 dark:text-gray-400 text-center">{data.id}</h6>{' '}
                    </div>
                </td>
                <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                    <h6 className="text-gray-500 dark:text-gray-400 text-lg">{data.title}</h6>{' '}
                </td>
                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <div>
                        <p className="text-gray-500 dark:text-gray-400">{data.about}</p>
                    </div>
                </td>

                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <p className="text-gray-500 dark:text-gray-400">{Object.values(data.tags).join(', ')}</p>
                </td>

                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <p className="text-gray-500 dark:text-gray-400">{Object.values(data.code_languages).join(', ')}</p>
                </td>
                {/* Action */}
                <td className="px-4 py-4 text-sm whitespace-nowrap"></td>
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
        if (thirdPartyModal.dataLoaded) {
            setThirdPartyModal({ ...thirdPartyModal, active: true });
        }
        router.get(route('dashboard.repository.index', { third_party_provider: 'github' }));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Repository{' '}
                    <span className="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                        {repositories.total} repository
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
                    columnsTitle={['id', 'Title', 'About', 'Tags', 'Languages', 'actions']}
                    customAddButton={addRepositoryFromThirdPartyButton}
                />
            </div>
            {thirdPartyModal.active && (
                <DashboardModal thirdPartyModal={thirdPartyModal} closeThirdPartyModal={closeThirdPartyModal}>
                    <AddRepositoryModal repositories={thirdParty.repositories} />
                </DashboardModal>
            )}
        </AuthenticatedLayout>
    );
}
