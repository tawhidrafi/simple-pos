<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        // Pass data to the view and return it
        return view('Product.Unit.index', compact('units'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'shortName' => 'required|string|max:100',
        ]);

        // If validation passes, create a new supplier
        $unit = Unit::create([
            'name' => $validatedData['name'],
            'shortName' => $validatedData['shortName'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Unit added successfully!');
    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $unit = Unit::findOrFail($id);

        $unit->delete();

        return redirect()->route('Unit.index')->with('success', 'Unit deleted successfully.');
    }
}
