<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\StoreSaleReturnRequest;
use App\Models\Sale\Sale;
use App\Models\Sale\SaleReturn;
use App\Services\SaleReturnService;

class SaleReturnController extends Controller
{
    // service definition
    protected $saleReturnService;
    public function __construct(SaleReturnService $service)
    {
        $this->saleReturnService = $service;
    }

    // index page
    public function index()
    {
        $saleReturns = SaleReturn::all();
        return view('sale-returns.index', compact('saleReturns'));
    }

    // create page
    public function create(Sale $sale)
    {
        $sale = Sale::with(['customer', 'saleItems.product', 'saleItems.variant'])->findOrFail($sale->id);
        return view('sale-returns.create', compact('sale'));
    }

    // store ne return
    public function store(StoreSaleReturnRequest $request)
    {
        $this->saleReturnService->createSaleReturnWithItems($request->validated());
        return redirect('/sale-returns')->with('success', 'Sale Return made successfully.');
    }

    //show
    public function show(SaleReturn $return)
    {
        $saleReturn = SaleReturn::getSingleSaleReturn($return->id);

        return view('sale-returns.show', compact('saleReturn'));
    }

    //updateStatus
    public function updateStatus(SaleReturn $return)
    {
        $this->saleReturnService->updateDeliveryStatus($return->id);
        return redirect()->back()->with('success', 'Return is completed');
    }
}
