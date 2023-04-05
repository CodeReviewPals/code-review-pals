import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Index({ auth, repositories }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Repository{" "}
                    <span className="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                        240 vendors
                    </span>
                </h2>
            }
        >
            <Head title="Repository" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <section>
                        <div className="sm:flex sm:items-center sm:justify-between">
                            <div>
                                <div className="relative flex items-center mt-4 md:mt-0">
                                    <span className="absolute">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            strokeWidth="1.5"
                                            stroke="currentColor"
                                            className="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600"
                                        >
                                            <path
                                                strokeLinecap="round"
                                                strokeLinejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                            />
                                        </svg>
                                    </span>

                                    <input
                                        type="text"
                                        placeholder="Search"
                                        className="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                    />
                                </div>
                            </div>

                            <div className="flex items-center mt-4 gap-x-3">
                                <button className="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-5 h-5"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>

                                    <span>Add vendor</span>
                                </button>
                            </div>
                        </div>
                        <div className="flex flex-col mt-6">
                            <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div className="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div className="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                        <table className="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead className="bg-gray-50 dark:bg-gray-800">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        className="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                                    >
                                                        <button className="flex items-center gap-x-3 focus:outline-none">
                                                            <span>Company</span>

                                                            <svg
                                                                className="h-3"
                                                                viewBox="0 0 10 11"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path
                                                                    d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                                    fill="currentColor"
                                                                    stroke="currentColor"
                                                                    strokeWidth="0.1"
                                                                />
                                                                <path
                                                                    d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                                    fill="currentColor"
                                                                    stroke="currentColor"
                                                                    strokeWidth="0.1"
                                                                />
                                                                <path
                                                                    d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                                    fill="currentColor"
                                                                    stroke="currentColor"
                                                                    strokeWidth="0.3"
                                                                />
                                                            </svg>
                                                        </button>
                                                    </th>

                                                    <th
                                                        scope="col"
                                                        className="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                                    >
                                                        Status
                                                    </th>

                                                    <th
                                                        scope="col"
                                                        className="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                                    >
                                                        About
                                                    </th>

                                                    <th
                                                        scope="col"
                                                        className="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                                    >
                                                        Users
                                                    </th>

                                                    <th
                                                        scope="col"
                                                        className="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                                    >
                                                        License use
                                                    </th>

                                                    <th scope="col" className="relative py-3.5 px-4">
                                                        <span className="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody className="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                <tr>
                                                    <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 className="font-medium text-gray-800 dark:text-white ">
                                                                Catalog
                                                            </h2>
                                                            <p className="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                catalogapp.io
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div className="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                            Customer
                                                        </div>
                                                    </td>
                                                    <td className="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 className="text-gray-700 dark:text-gray-200">
                                                                Content curating app
                                                            </h4>
                                                            <p className="text-gray-500 dark:text-gray-400">
                                                                Brings all your news into one place
                                                            </p>
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
                                                            <div className="bg-blue-500 w-2/3 h-1.5"></div>
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

                                                <tr>
                                                    <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 className="font-medium text-gray-800 dark:text-white ">
                                                                Circooles
                                                            </h2>
                                                            <p className="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                getcirooles.com
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div className="inline px-3 py-1 text-sm font-normal text-gray-500 bg-gray-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                            Churned
                                                        </div>
                                                    </td>
                                                    <td className="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 className="text-gray-700 dark:text-gray-200">
                                                                Design software
                                                            </h4>
                                                            <p className="text-gray-500 dark:text-gray-400">
                                                                Super lightweight design app
                                                            </p>
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
                                                            <div className="bg-blue-500 w-2/5 h-1.5"></div>
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

                                                <tr>
                                                    <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 className="font-medium text-gray-800 dark:text-white ">
                                                                Sisyphus
                                                            </h2>
                                                            <p className="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                sisyphus.com
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div className="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                            Customer
                                                        </div>
                                                    </td>
                                                    <td className="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 className="text-gray-700 dark:text-gray-200">
                                                                Automation and workflow
                                                            </h4>
                                                            <p className="text-gray-500 dark:text-gray-400">
                                                                Time tracking, invoicing and expenses
                                                            </p>
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
                                                            <div className="bg-blue-500 w-11/12 h-1.5"></div>
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

                                                <tr>
                                                    <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 className="font-medium text-gray-800 dark:text-white ">
                                                                Hourglass
                                                            </h2>
                                                            <p className="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                hourglass.app
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div className="inline px-3 py-1 text-sm font-normal text-gray-500 bg-gray-100 rounded-full dark:text-gray-400 gap-x-2 dark:bg-gray-800">
                                                            Churned
                                                        </div>
                                                    </td>
                                                    <td className="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 className="text-gray-700 dark:text-gray-200">
                                                                Productivity app
                                                            </h4>
                                                            <p className="text-gray-500 dark:text-gray-400">
                                                                Time management and productivity
                                                            </p>
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
                                                            <div className="bg-blue-500 w-1/3 h-1.5"></div>
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

                                                <tr>
                                                    <td className="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div>
                                                            <h2 className="font-medium text-gray-800 dark:text-white ">
                                                                Quotient
                                                            </h2>
                                                            <p className="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                quotient.co
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                        <div className="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                            Customer
                                                        </div>
                                                    </td>
                                                    <td className="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div>
                                                            <h4 className="text-gray-700 dark:text-gray-200">
                                                                Sales CRM
                                                            </h4>
                                                            <p className="text-gray-500 dark:text-gray-400">
                                                                Web-based sales doc management
                                                            </p>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="mt-6 sm:flex sm:items-center sm:justify-between ">
                            <div className="text-sm text-gray-500 dark:text-gray-400">
                                Page <span className="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>
                            </div>

                            <div className="flex items-center mt-4 gap-x-4 sm:mt-0">
                                <a
                                    href="#"
                                    className="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-5 h-5 rtl:-scale-x-100"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"
                                        />
                                    </svg>

                                    <span>previous</span>
                                </a>

                                <a
                                    href="#"
                                    className="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800"
                                >
                                    <span>Next</span>

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-5 h-5 rtl:-scale-x-100"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
