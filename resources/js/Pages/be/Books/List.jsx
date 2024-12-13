import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import DataTable from "@/Components/DataTable.jsx";
import { PlusCircleIcon } from "@heroicons/react/20/solid";

export default function List({ auth, pageTitle, pageDescription, books }) {
    console.log("Books data: ", books);  // Log the received data

    const actionUrls = {
        createEditRouteName: 'dashboard.be.books.create',
        removeALlRouteName: 'dashboard.be.books.removeAll',
        removeRouteName: 'dashboard.be.books.remove',
        editRouteName: 'dashboard.be.books.edit'
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={pageTitle} />
            <div className="m-5 p-5 flow-root shadow sm:rounded-lg">
                <div className="sm:flex sm:items-center">
                    <div className="sm:flex-auto">
                        <h1 className="text-base font-semibold leading-6 text-gray-900">
                            {pageTitle}
                        </h1>
                        <p className="mt-2 text-sm text-gray-700">
                            {pageDescription}
                        </p>
                    </div>
                    <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <Link
                            href={route(actionUrls.createEditRouteName)}
                            className="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500"
                        >
                            <PlusCircleIcon className="-mr-0.5 h-5 w-5" aria-hidden="true" />
                            Add new
                        </Link>
                    </div>
                </div>

                <div className="mt-8 flow-root">
                <DataTable
    excludedColumns={['id']}
    fetchUrl={route('fetch.addresses')}
    columns={[
        'id', 'title', 'slug', 'ISBN_10', 'contact_no',
        'contact_name', 'contact_number',
        'address_line_1', 'address_line_2',
        'address_line_3', 'pincode',
        'city', 'state', 'country',
        'created_at', 'updated_at'
    ]}
    actionUrls={actionUrls}
/>

                </div>
            </div>
        </AuthenticatedLayout>
    );
}
