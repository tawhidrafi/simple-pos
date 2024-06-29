<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerGroupController extends Controller
{
    public function index()
    {
        // Fetch all suppliers from the database
        $customer_groups = CustomerGroup::all();

        // Pass data to the view and return it
        return view('Contact.CustomerGroup.index', compact('customer_groups'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|min:0',
            'is_default' => 'required',
        ]);

        // If validation passes, create a new supplier
        $customer_groups = CustomerGroup::create([
            'title' => $validatedData['title'],
            'discount' => $validatedData['discount'],
            'is_default' => $validatedData['is_default'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'New Group added successfully!');
    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $customer_group = CustomerGroup::findOrFail($id);

        $customer_group->delete();

        return redirect()->route('CustomerGroup.index')->with('success', 'Group deleted successfully.');
    }
}
