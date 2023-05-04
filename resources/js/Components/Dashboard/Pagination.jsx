import { Link } from '@inertiajs/react';

export default function DashboardTablePagination({ totalPages, currentPage, links }) {
    return (
        <div className="mt-6 sm:flex sm:items-center sm:justify-between ">
            <div className="text-sm text-gray-500 dark:text-gray-400">
                Page{' '}
                <span className="font-medium text-gray-700 dark:text-gray-100">
                    {currentPage} of {totalPages || 1}
                </span>
            </div>

            <div className="flex items-center mt-4 gap-x-4 sm:mt-0">
                {links.map((link, index) => {
                    let extraCss = link.label == currentPage ? 'pointer-events-none' : '';
                    extraCss += link.active ? '' : ' hidden';
                    return (
                        <Link
                            preserveState
                            href={link.url}
                            className={
                                'flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 ' +
                                extraCss
                            }
                            key={index}
                        >
                            <span dangerouslySetInnerHTML={{ __html: link.label }}></span>
                        </Link>
                    );
                })}
            </div>
        </div>
    );
}
