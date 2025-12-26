<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\StorePurchaseReturnRequest;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseReturn;
use App\Services\PurchaseReturnService;

class PurchaseReturnController extends Controller
{
    //
    protected $purchaseReturn;
    protected $purchaseReturnService;

    public function __construct(PurchaseReturn $purchaseReturn, PurchaseReturnService $service)
    {
        $this->purchaseReturn = $purchaseReturn;
        $this->purchaseReturnService = $service;
    }

    public function index()
    {
        $purchaseReturns = $this->purchaseReturn::all();
        return view('purchase-returns.index', compact('purchaseReturns'));
    }

    //create
    public function create($id)
    {
        $purchase = Purchase::with(['supplier', 'purchaseItems.product', 'purchaseItems.variant'])->findOrFail($id);
        return view('purchase-returns.create', compact('purchase'));
    }


    //store
    public function store(StorePurchaseReturnRequest $request)
    {
        $this->purchaseReturnService->createPurchaseReturnWithItems($request->validated());
        return redirect('/purchases')->with('alert', 'Purchase Return made successfully.');
    }

    //show
    public function show($id)
    {
        $purchaseReturn = $this->purchaseReturn::getSinglePurchaseReturn($id);

        return view('purchase-returns.show', compact('purchaseReturn'));
    }

    //updateStatus
    public function updateStatus($id)
    {
        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchaseReturn->status = 'completed';
        $purchaseReturn->save();
        return redirect()->back()->with('alert', 'Return is completed');
    }
}
