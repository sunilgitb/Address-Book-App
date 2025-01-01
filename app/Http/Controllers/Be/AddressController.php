<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use App\Models\Book;
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
     * Display the user's profile form.
     */
    public function list(Request $request): Response
    {
        try {
            $books = Address::all();
            // dd($books);

            return Inertia::render('be/Address/List', [
                'user'       => $request->user(),
                'pageTitle'  => 'Address List',
                'pageDescription' => 'A list of all the addresses.',
                'books'      => $books
            ]);
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Book Create Form
     */
    public function create(Request $request): Response
    {

        
        try {
            return Inertia::render('be/Address/Form', [
                'user' => $request->user(),
                'pageTitle' => 'Create Address',
                'pageDescription' => '',
                'pageData' => null,
                'formUrl' => route('dashboard.be.address.storeUpdate')
            ]);
        }catch (Exception $exception){
            dd($exception);
        }
    }

    /**
     * Book Create Form
     */
    public function edit($bookId , Request $request): Response
    {
        try {
            $getBookInfo = Address::where('id',operator: $bookId)->first();
            return Inertia::render('be/Address/Form', [
                'user' => $request->user(),
                'pageTitle' => 'Edit Address',
                'pageDescription' => '',
                'pageData' => $getBookInfo,
                'formUrl' => route('dashboard.be.address.storeUpdate',$bookId)
            ]);
        }catch (Exception $exception){
            dd($exception);
        }
    }
    /**
     * Handle book form.
     *
     * @throws ValidationException
     */
    public function storeUpdate(Request $request, $userId = 0): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'title'        => 'required|string|max:255',
            'contact_no'        => 'required|string|max:255',
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

        // Use updateOrCreate properly
        Address::updateOrCreate(
            [
                'title' => $request->title,
                // 'slug'  => Str::slug($request->title),
            ],
            [
                'contact_name'  => $request->contact_name,
                'contact_number' => $request->contact_number,
                'address_line_1'  => $request->address_line_1,
                'address_line_2'  => $request->address_line_2,
                'address_line_3'  => $request->address_line_3,
                'pincode'       => $request->pincode,
                'city'         => $request->city,
                'state'        => $request->state,
                'country'      => $request->country,
                'is_default_from' => $request->is_default_from ?? false,
                'is_default_to'   => $request->is_default_to ?? false,
            ]
        );

        return redirect()->route('dashboard.be.address.list');
    }

    /**
     * Remove Book
     * */
    public function remove($book_id): RedirectResponse
    {
        Address::where('id',$book_id)->delete();
        return redirect()->route('dashboard.be.address.list');
    }
}
