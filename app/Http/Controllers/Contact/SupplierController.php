<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\SupplierCreateRequest;
use App\Http\Requests\Contact\SupplierUpdateRequest;
use App\Models\Contact\Supplier;
use Illuminate\Support\Facades\Gate;

class SupplierController extends Controller
{
    // index page
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }
    // create new supplier
    public function store(SupplierCreateRequest $request)
    {
        if (!Gate::allows('manage-suppliers')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validated();
        Supplier::create($validated);
        return redirect()->back()->with('success', 'Supplier added successfully!');
    }
    // show single supplier info, purchases
    public function show(Supplier $supplier)
    {
        $supplier->load('purchases');
        return view('supplier.show', compact('supplier'));
    }
    // edit page
    public function edit(Supplier $supplier)
    {
        if (!Gate::allows('manage-suppliers')) {
            abort(403, 'Unauthorized action.');
        }

        return view('supplier.edit', compact('supplier'));
    }
    // update supplier
    public function update(Supplier $supplier, SupplierUpdateRequest $request)
    {
        if (!Gate::allows('manage-suppliers')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validated();
        $supplier->update($validated);
        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully!');
    }
    // delete supplier
    public function destroy(Supplier $supplier)
    {
        if (!Gate::allows('manage-suppliers')) {
            abort(403, 'Unauthorized action.');
        }

        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully!');
    }
}
