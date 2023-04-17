import DashboardTable from "@/Components/Dashboard/Table";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {Head, Link} from "@inertiajs/react";

export default function PullRequestIndex({auth, pullRequests}) {
    const rowRender = (data, index) => {
        return (
            <tr key={index}>
                <td className="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">
                    <div>
                        <h6 className="text-gray-500 dark:text-gray-400">{data.id}</h6>
                    </div>
                </td>
                <td className="px-12 py-4 text-sm text-center font-medium whitespace-nowrap">
                    <h6 className="text-gray-500 dark:text-gray-400">{data.repository}</h6>
                </td>
                <td className="px-4 py-4 text-sm text-center whitespace-nowrap">
                    <a href={data.html_url} target="_blank" className="text-white underline font-bold">
                        <p className="text-gray-500 dark:text-gray-400">{data.title}</p>
                    </a>
                </td>
                {/* Action */}
                <td className="px-4 py-4 text-sm text-center whitespace-nowrap">
                    { auth.user.id === data.user_id &&
                        <Link href={route('pull-requests.destroy', data.id)} method="delete" className="text-red-600 hover:text-red-900">
                            Delete
                        </Link>
                    }
                </td>
            </tr>
        );
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Pull Request{" "}
                    <span
                        className="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                        {pullRequests.total + (pullRequests.total > 1 ? ' pull requests' : ' pull request')}
                    </span>
                </h2>
            }
        >
            <Head title="Repository"/>

            <div className="py-12">
                <DashboardTable
                    tableData={pullRequests}
                    routePrefix="pull-requests"
                    rowRender={rowRender}
                    suffixName="Pull Request"
                    columnsTitle={["ID", "Repository", "Title", "Actions"]}
                />
            </div>
        </AuthenticatedLayout>
    );
}
