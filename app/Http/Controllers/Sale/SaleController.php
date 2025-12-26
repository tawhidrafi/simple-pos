<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\StoreSaleRequest;
use App\Models\Contact\Customer;
use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Sale\Sale;
use App\Services\SaleService;

class SaleController extends Controller
{
    // service definition
    protected $saleService;
    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    // index page
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    // create page
    public function create()
    {
        // collect data
        $customers = Customer::all();
        $products = Product::where('is_variable', false)->get();
        $variants = Variant::all();
        // return view
        return view('sales.create', compact('customers', 'products', 'variants'));
    }

    // store new sale
    public function store(StoreSaleRequest $request)
    {
        $this->saleService->createSaleWithItems($request->validated());
        return redirect('/sales')->with('success', 'Sale made successfully.');
    }

    // show single sale details
    public function show(Sale $sale)
    {
        $sale = Sale::getSingleSale($sale->id);
        return view('sales.show', compact('sale'));
    }

    // update delivery status
    public function updateDeliveryStatus(Sale $sale)
    {
        $this->saleService->updateDeliveryStatus($sale->id);
        return redirect('/sales')->with('success', 'Delivery status updated successfully.');
    }
}
