<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|ends_with:@gmail.com|unique:customers,email',
            'phone'   => 'required|digits:10|unique:customers,phone',
            'address' => 'nullable|string',
            'status'  => 'required|in:active,inactive',
        ], $this->messages());

        Customer::create($validated);

        return redirect()->route('customers.index') ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): View
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|ends_with:@gmail.com|unique:customers,email,' . $customer->id,
            'phone'   => 'required|digits:10|unique:customers,phone,' . $customer->id,
            'address' => 'nullable|string',
            'status'  => 'required|in:active,inactive',
        ], $this->messages());

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    /**
     * Get custom validation messages.
     */
    protected function messages(): array
    {
        return [
            'email.ends_with' => 'Please use a valid Gmail address (@gmail.com).',
            'phone.digits'    => 'Phone number must contain only 10 digits (077..).',
            'phone.unique'    => 'This phone number is already registered.',
        ];
    }
}
