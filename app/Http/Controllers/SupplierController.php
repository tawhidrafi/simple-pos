<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        // Fetch all suppliers from the database
        $suppliers = Supplier::all();

        // Pass data to the view and return it
        return view('Contact.Supplier.index', compact('suppliers'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'tin' => 'required|string|max:20|unique:suppliers,tin',
        ]);

        // If validation passes, create a new supplier
        $supplier = Supplier::create([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'company' => $validatedData['company'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'tin' => $validatedData['tin'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Supplier added successfully!');
    }

    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id); // Find supplier by ID

        $supplier->delete(); // Delete the supplier

        return redirect()->route('Supplier.index')->with('success', 'Supplier deleted successfully.');
    }
}
