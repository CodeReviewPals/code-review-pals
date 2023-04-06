import { Link } from "@inertiajs/react";
import DashboardTablePagination from "../Pagination";

export default function DashboardTable({
    tableData,
    routePrefix,
    rowRender,
    suffixName,
    columnsTitle,
    customAddButton,
}) {
    return (
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
                    <div className="flex flex-row space-x-2">
                        {customAddButton() || (
                            <Link href={route(`${routePrefix}.create`)} className="flex items-center mt-4 gap-x-3">
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

                                    <span>Add {suffixName}</span>
                                </button>
                            </Link>
                        )}
                    </div>
                </div>
                <div className="flex flex-col mt-6">
                    <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div className="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div className="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table className="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead className="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            {columnsTitle.map((title, index) => {
                                                return (
                                                    <th
                                                        key={index}
                                                        scope="col"
                                                        className="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                                    >
                                                        {title}
                                                    </th>
                                                );
                                            })}
                                        </tr>
                                    </thead>
                                    <tbody className="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        {tableData.data.map(rowRender)}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <DashboardTablePagination
                    totalPages={Math.ceil(tableData.total / tableData.per_page)}
                    currentPage={tableData.current_page}
                    links={tableData.links}
                />
            </section>
        </div>
    );
}
