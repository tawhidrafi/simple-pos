<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('Product.Group.index', compact('groups'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);
        $supplier = Group::create($validatedData);
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
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('Group.index')->with('success', 'Group deleted successfully.');
    }
}
