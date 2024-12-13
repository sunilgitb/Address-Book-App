<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class AddressController extends Controller
{
    /**
     * Display the user's addresses.
     */
    public function list(Request $request): Response
    {
        try {
            $addresses = Address::where('user_id', $request->user()->id)->get();

            return Inertia::render('be/Addresses/List', [
                'user' => $request->user(),
                'addresses' => $addresses,
                'pageTitle' => 'Address List',
                'pageDescription' => 'A list of all your addresses.'
            ]);
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Address Create Form.
     */
    public function create(Request $request): Response
    {
        try {
            return Inertia::render('be/Addresses/Form', [
                'user' => $request->user(),
                'pageTitle' => 'Add New Address',
                'pageData' => null,
                'formUrl' => route('dashboard.be.addresses.storeUpdate')
            ]);
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Address Edit Form.
     */
    public function edit($addressId, Request $request): Response
    {
        try {
            $address = Address::findOrFail($addressId);

            return Inertia::render('be/Addresses/Form', [
                'user' => $request->user(),
                'pageTitle' => 'Edit Address',
                'pageData' => $address,
                'formUrl' => route('dashboard.be.addresses.storeUpdate', $addressId)
            ]);
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Handle storing and updating addresses.
     */
    public function storeUpdate(Request $request, $addressId = null): RedirectResponse
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'contact_name'  => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'address_line_1'  => 'required|string|max:255',
            'address_line_2'  => 'nullable|string|max:255',
            'address_line_3'  => 'nullable|string|max:255',
            'pincode'       => 'required|string|max:10',
            'city'         => 'required|string|max:100',
            'state'        => 'required|string|max:100',
            'country'      => 'required|string|max:100',
            'is_default_from' => 'boolean',
            'is_default_to'   => 'boolean',
        ]);

        try {
            if ($addressId) {
                $address = Address::findOrFail($addressId);
                $address->update([
                    'user_id'       => $request->user()->id,
                    'title'        => $request->title,
                    'contact_name'  => $request->contact_name,
                    'contact_number' => $request->contact_number,
                    'address_line_1'  => $request->address_line_1,
                    'address_line_2'  => $request->address_line_2,
                    'address_line_3'  => $request->address_line_3,
                    'pincode'       => $request->pincode,
                    'city'         => $request->city,
                    'state'        => $request->state,
                    'country'      => $request->country,
                    'is_default_from'  => $request->has('is_default_from'),
                    'is_default_to'    => $request->has('is_default_to'),
                ]);
            } else {
                Address::create([
                    'user_id'       => $request->user()->id,
                    'title'        => $request->title,
                    'contact_name'  => $request->contact_name,
                    'contact_number' => $request->contact_number,
                    'address_line_1'  => $request->address_line_1,
                    'address_line_2'  => $request->address_line_2,
                    'address_line_3'  => $request->address_line_3,
                    'pincode'       => $request->pincode,
                    'city'         => $request->city,
                    'state'        => $request->state,
                    'country'      => $request->country,
                    'is_default_from'  => $request->has('is_default_from'),
                    'is_default_to'    => $request->has('is_default_to'),
                ]);
            }
            
            return redirect()->route('dashboard.be.books.list');

        } catch (ValidationException $validationException) {
            return redirect()->back()->withErrors($validationException->errors());
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Remove an address.
     */
    public function remove($addressId): RedirectResponse
    {
        try {
            Address::findOrFail($addressId)->delete();

            return redirect()->route('dashboard.be.addresses.list');
        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
