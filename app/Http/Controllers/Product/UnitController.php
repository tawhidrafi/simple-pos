<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    // index, create, edit page
    public function index()
    {
        $units = Unit::all();

        return view('products.units.index', compact('units'));
    }
    // create unit 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string',
        ]);

        Unit::create($validated);

        return redirect()->route('units.index')->with('success', 'Unit created successfully');
    }
    // update unit
    public function update(Request $request, Unit $unit)
    {
        $validated  = $request->validate([
            'name' => 'string',
        ]);

        $unit->update($validated);

        return redirect()->back()->with('success', 'Unit deleted successfully');
    }
    // delete unit
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->back()->with('success', 'Unit deleted successfully');
    }
}
