import { useEffect } from 'react';
import { Head, Link } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { XCircleIcon } from '@heroicons/react/20/solid';
import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-dt/css/jquery.dataTables.css';

export default function AddressList({ auth, pageTitle, pageDescription, addresses }) {

    useEffect(() => {
        // Initialize DataTables
        $(document).ready(function () {
            $('#addressTable').DataTable();
        });
    }, []);

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={pageTitle} />

            <div className="m-5 p-5 flow-root shadow sm:rounded-lg">
                <div className="sm:flex sm:items-center border-b pb-3">
                    <div className="sm:flex-auto">
                        <h1 className="text-base font-semibold leading-6 text-gray-900">{pageTitle}</h1>
                        {pageDescription && (
                            <p className="mt-2 text-sm text-gray-700">{pageDescription}</p>
                        )}
                    </div>
                </div>

                {/* Address List Table */}
                <div className="mt-4 overflow-hidden bg-white shadow sm:rounded-lg">
                    <table id="addressTable" className="min-w-full divide-y divide-gray-300">
                        <thead className="bg-gray-50">
                            <tr>
                                <th>Title</th>
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>Address Line 3</th>
                                <th>Pincode</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Default From</th>
                                <th>Default To</th>
                            </tr>
                        </thead>
                        <tbody>
                            {addresses.length > 0 ? (
                                addresses.map((address) => (
                                    <tr key={address.id}>
                                        <td>{address.title}</td>
                                        <td>{address.contact_name}</td>
                                        <td>{address.contact_number}</td>
                                        <td>{address.address_line_1}</td>
                                        <td>{address.address_line_2}</td>
                                        <td>{address.address_line_3}</td>
                                        <td>{address.pincode}</td>
                                        <td>{address.city}</td>
                                        <td>{address.state}</td>
                                        <td>{address.country}</td>
                                        <td>{address.is_default_from ? 'Yes' : 'No'}</td>
                                        <td>{address.is_default_to ? 'Yes' : 'No'}</td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="12" className="px-6 py-4 text-center text-gray-500">
                                        No addresses found.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>

                {/* Link to add a new address */}
                <div className="mt-4 flex justify-end">
                    <Link
                        href={route('addresses.create')}
                        className="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500"
                    >
                        Add New Address
                    </Link>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
