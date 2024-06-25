<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    //
    public function index()
    {
        return view('Product.Brand.index');
    }
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:5'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Brand.index')->withInput()->withErrors($validator);
        }

        $brand = new Brands();
        $brand->title = $request->title;

        $brand->save();

        return redirect()->route('Brand.index')->with('success', 'Brand Created Succesfully');
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
