<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([

            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|max:150|email|unique:customers',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Customer::create(
            [
                'first_name' => $validate['first_name'],
                'last_name' => $validate['last_name'],
                'email' => $validate['email'],
                'phone_number' => $validate['phone_number'],
                'address' => $validate['address'],
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
            ]
        );

        return redirect()->route('customers.index')
            ->with('create', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $customers = Customer::findOrFail($id);
        return view('customers.edit', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $customer = Customer::findOrFail($id);

        $validate = $request->validate([

            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|max:150|email',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $customer->update(
            [
                'first_name' => $validate['first_name'],
                'last_name' => $validate['last_name'],
                'email' => $validate['email'],
                'phone_number' => $validate['phone_number'],
                'address' => $validate['address'],
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
            ]
        );

        return redirect()->route('customers.index')
            ->with('update', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('delete', 'Customer deleted successfully');
    }
}
