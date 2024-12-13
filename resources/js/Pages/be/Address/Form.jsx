import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, Link, useForm} from '@inertiajs/react';
import InputLabel from "@/Components/InputLabel.jsx";
import TextInput from "@/Components/TextInput.jsx";
import InputError from "@/Components/InputError.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";
import {useEffect} from "react";
import {XCircleIcon} from "@heroicons/react/20/solid/index.js";

export default function Form({auth, pageTitle, pageDescription, pageData, formUrl}) {
    const {data, setData, patch, processing, errors, reset} = useForm({
        title       : pageData ? pageData.title : '',
        contact_name: pageData ? pageData.contact_name : '',
        contact_number: pageData ? pageData.contact_number : '',
        address_line_1: pageData ? pageData.address_line_1 : '',
        address_line_2: pageData ? pageData.address_line_2 : '',
        address_line_3: pageData ? pageData.address_line_3 : '',
        pincode     : pageData ? pageData.pincode : '',
        city        : pageData ? pageData.city : '',
        state       : pageData ? pageData.state : '',
        country     : pageData ? pageData.country : '',
        is_default_from: pageData ? pageData.is_default_from : false,
        is_default_to: pageData ? pageData.is_default_to : false,
    });

    useEffect(() => {
        return () => {
            reset('title', 'contact_name', 'contact_number', 'address_line_1', 'address_line_2', 'address_line_3', 'pincode', 'city', 'state', 'country', 'is_default_from', 'is_default_to');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        patch(formUrl);
    };

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

                <form onSubmit={submit} className="space-y-6">
                    <div className="grid grid-cols-2 gap-4 py-4">
                        {/* Title */}
                        <div>
                            <InputLabel htmlFor="title" value="Title" />
                            <TextInput
                                id="title"
                                name="title"
                                type="text"
                                placeholder="Enter title"
                                value={data.title}
                                onChange={(e) => setData('title', e.target.value)}
                            />
                            <InputError message={errors.title} />
                        </div>

                        {/* Contact Name */}
                        <div>
                            <InputLabel htmlFor="contact_name" value="Contact Name" />
                            <TextInput
                                id="contact_name"
                                name="contact_name"
                                type="text"
                                placeholder="Enter contact name"
                                value={data.contact_name}
                                onChange={(e) => setData('contact_name', e.target.value)}
                            />
                            <InputError message={errors.contact_name} />
                        </div>

                        {/* Contact Number */}
                        <div>
                            <InputLabel htmlFor="contact_number" value="Contact Number" />
                            <TextInput
                                id="contact_number"
                                name="contact_number"
                                type="text"
                                placeholder="Enter contact number"
                                value={data.contact_number}
                                onChange={(e) => setData('contact_number', e.target.value)}
                            />
                            <InputError message={errors.contact_number} />
                        </div>

                        {/* Address Line 1 */}
                        <div>
                            <InputLabel htmlFor="address_line_1" value="Address Line 1" />
                            <TextInput
                                id="address_line_1"
                                name="address_line_1"
                                type="text"
                                placeholder="Enter address line 1"
                                value={data.address_line_1}
                                onChange={(e) => setData('address_line_1', e.target.value)}
                            />
                            <InputError message={errors.address_line_1} />
                        </div>

                        {/* Address Line 2 */}
                        <div>
                            <InputLabel htmlFor="address_line_2" value="Address Line 2" />
                            <TextInput
                                id="address_line_2"
                                name="address_line_2"
                                type="text"
                                placeholder="Enter address line 2"
                                value={data.address_line_2}
                                onChange={(e) => setData('address_line_2', e.target.value)}
                            />
                            <InputError message={errors.address_line_2} />
                        </div>

                        {/* Address Line 3 */}
                        <div>
                            <InputLabel htmlFor="address_line_3" value="Address Line 3" />
                            <TextInput
                                id="address_line_3"
                                name="address_line_3"
                                type="text"
                                placeholder="Enter address line 3"
                                value={data.address_line_3}
                                onChange={(e) => setData('address_line_3', e.target.value)}
                            />
                            <InputError message={errors.address_line_3} />
                        </div>

                        {/* Pincode */}
                        <div>
                            <InputLabel htmlFor="pincode" value="Pincode" />
                            <TextInput
                                id="pincode"
                                name="pincode"
                                type="text"
                                placeholder="Enter pincode"
                                value={data.pincode}
                                onChange={(e) => setData('pincode', e.target.value)}
                            />
                            <InputError message={errors.pincode} />
                        </div>

                        {/* City */}
                        <div>
                            <InputLabel htmlFor="city" value="City" />
                            <TextInput
                                id="city"
                                name="city"
                                type="text"
                                placeholder="Enter city"
                                value={data.city}
                                onChange={(e) => setData('city', e.target.value)}
                            />
                            <InputError message={errors.city} />
                        </div>

                        {/* State */}
                        <div>
                            <InputLabel htmlFor="state" value="State" />
                            <TextInput
                                id="state"
                                name="state"
                                type="text"
                                placeholder="Enter state"
                                value={data.state}
                                onChange={(e) => setData('state', e.target.value)}
                            />
                            <InputError message={errors.state} />
                        </div>

                        {/* Country */}
                        <div>
                            <InputLabel htmlFor="country" value="Country" />
                            <TextInput
                                id="country"
                                name="country"
                                type="text"
                                placeholder="Enter country"
                                value={data.country}
                                onChange={(e) => setData('country', e.target.value)}
                            />
                            <InputError message={errors.country} />
                        </div>

                        {/* Default From */}
                        <div>
                            <label>
                                <input
                                    type="checkbox"
                                    checked={data.is_default_from}
                                    onChange={(e) => setData('is_default_from', e.target.checked)}
                                />
                                Set as Default From
                            </label>
                        </div>

                        {/* Default To */}
                        <div>
                            <label>
                                <input
                                    type="checkbox"
                                    checked={data.is_default_to}
                                    onChange={(e) => setData('is_default_to', e.target.checked)}
                                />
                                Set as Default To
                            </label>
                        </div>
                    </div>

                    <div className="flex items-center justify-end align-middle gap-2 pt-3 border-t">
                        <Link href={route('dashboard.be.books.list')} className="inline-flex items-center gap-x-1.5 rounded-md bg-gray-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500">
                            <XCircleIcon className="-mr-0.5 h-5 w-5" aria-hidden="true" />
                            Cancel
                        </Link>

                        <PrimaryButton className="rounded-md bg-indigo-600 px-3 py-1.5 text-sm text-white" disabled={processing}>
                            Submit
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
