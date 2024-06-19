<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('Contact.Customer.index');
    }
    public function createView()
    {
        $customerGroups = CustomerGroup::all();
        return view('Contact.Customer.create', compact('customerGroups'));
    }
    public function store(Request $request)
    {

    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {

    }
}
