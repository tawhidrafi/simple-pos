<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerGroupController extends Controller
{
    public function index()
    {
        return view('Contact.CustomerGroup.index');
    }
    public function createView()
    {
        return view('Contact.CustomerGroup.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'discount' => 'required|min:0',
            'is_default' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('CustomerGroup.create')->withInput()->withErrors($validator);
        }

        $customerGroup = new CustomerGroup();
        $customerGroup->title = $request->title;
        $customerGroup->discount = $request->discount;
        $customerGroup->is_default = $request->is_default;
        $customerGroup->save();

        return redirect()->route('CustomerGroup.index')->with('success', 'New Group Created Successfully');
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
