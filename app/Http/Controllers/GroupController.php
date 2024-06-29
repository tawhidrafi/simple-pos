<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        // Pass data to the view and return it
        return view('Product.Group.index', compact('groups'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);

        // If validation passes, create a new supplier
        $supplier = Group::create([
            'title' => $validatedData['title'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Group added successfully!');
    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $group = Group::findOrFail($id); // Find supplier by ID

        $group->delete(); // Delete the supplier

        return redirect()->route('Group.index')->with('success', 'Group deleted successfully.');
    }
}
