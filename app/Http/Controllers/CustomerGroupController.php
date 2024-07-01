<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;

class CustomerGroupController extends Controller
{
    public function index()
    {
        $customer_groups = CustomerGroup::all();
        return view('Contact.CustomerGroup.index', compact('customer_groups'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|min:0',
            'is_default' => 'required',
        ]);
        $customer_groups = CustomerGroup::create($validatedData);
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
