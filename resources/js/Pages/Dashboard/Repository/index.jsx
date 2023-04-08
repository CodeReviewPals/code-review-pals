import DashboardTable from "@/Components/Dashboard/Table";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import GithubLogo from "@/../images/dashboard/github.svg";
import { useState } from "react";
import DashboardModal from "@/Components/Dashboard/Modal";
import AddRepositoryModal from "./AddRepositoryModal";

export default function Index({ auth, repositories }) {
    const [thirdPartyModal, setThirdPartyModal] = useState({ active: false, provider: null });
    const closeThirdPartyModal = () => {
        setThirdPartyModal({ active: false });
    };
    const rowRender = ($data) => {
        return (
            <tr>
                <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    <div>
                        <h2 className="font-medium text-gray-800 dark:text-white ">Quotient</h2>
                        <p className="text-sm font-normal text-gray-600 dark:text-gray-400">quotient.co</p>
                    </div>
                </td>
                <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                    <div className="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                        Customer
                    </div>
                </td>
                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <div>
                        <h4 className="text-gray-700 dark:text-gray-200">Sales CRM</h4>
                        <p className="text-gray-500 dark:text-gray-400">Web-based sales doc management</p>
                    </div>
                </td>
                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <div className="flex items-center">
                        <img
                            className="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80"
                            alt=""
                        />
                        <img
                            className="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0"
                            src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80"
                            alt=""
                        />
                        <img
                            className="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0"
                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1256&q=80"
                            alt=""
                        />
                        <img
                            className="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0"
                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80"
                            alt=""
                        />
                        <p className="flex items-center justify-center w-6 h-6 -mx-1 text-xs text-blue-600 bg-blue-100 border-2 border-white rounded-full">
                            +4
                        </p>
                    </div>
                </td>

                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <div className="w-48 h-1.5 bg-blue-200 overflow-hidden rounded-full">
                        <div className="bg-blue-500 w-1/6 h-1.5"></div>
                    </div>
                </td>

                <td className="px-4 py-4 text-sm whitespace-nowrap">
                    <button className="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            strokeWidth="1.5"
                            stroke="currentColor"
                            className="w-6 h-6"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                            />
                        </svg>
                    </button>
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
            provider: "github",
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Repository{" "}
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
                    columnsTitle={["id", "Title", "About", "Tags", "Languages", "actions"]}
                    customAddButton={addRepositoryFromThirdPartyButton}
                />
            </div>
            {thirdPartyModal.active && (
                <DashboardModal thirdPartyModal={thirdPartyModal} closeThirdPartyModal={closeThirdPartyModal}>
                    <AddRepositoryModal
                        auth={auth}
                        provider={thirdPartyModal.provider}
                        closeThirdPartyModal={closeThirdPartyModal}
                    />
                </DashboardModal>
            )}
        </AuthenticatedLayout>
    );
}
