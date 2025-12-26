<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\PurchaseRequest;
use App\Models\Accounting\PaymentMethod;
use App\Models\Contact\Supplier;
use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Purchase\Purchase;
use App\Services\PurchaseService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //
    protected $purchaseService;
    public function __construct(PurchaseService $purchaseService, Purchase $purchase)
    {
        $this->purchaseService = $purchaseService;
    }
    //
    public function index()
    {
        $purchases = Purchase::getAllPurchase();
        return view('purchases.index', compact('purchases'));
    }
    //
    public function create()
    {
        $suppliers = Supplier::getAllSuppliers();
        $products = Product::getAllNonVariableProducts();
        $variants = Variant::getAllVariants();
        return view('purchases.create', compact('suppliers', 'products', 'variants'));
    }
    //
    public function store(PurchaseRequest $request)
    {
        $this->purchaseService->createPurchaseWithItems($request->validated());
        return redirect('/purchases')->with('success', 'Purchase made successfully.');
    }
    //
    public function show(Purchase $purchase)
    {
        $purchase = $purchase->getSinglePurchase();
        return view('purchases.show', compact('purchase'));
    }

    //
    public function updateDeliveryStatus($id)
    {
        $this->purchaseService->updateDeliveryStatus($id);
        return redirect('/purchases')->with('success', 'Delivery status updated successfully.');
    }
    //
    public function showPaymentForm(Purchase $purchase)
    {
        $purchase = $purchase->getSinglePurchase();
        $paymentMethods = PaymentMethod::getAllPaymentMethod();
        return view('purchases.pay', compact('purchase', 'paymentMethods'));
    }
    //
    public function addPaymentforPurchases(Request $request)
    {
        $data = $request->validate([
            'purchase_id' => 'exists:purchases,id',
            'created_by' => 'exists:users,id',
            'payment_method_id' => 'exists:payment_methods,id',
            'paid_amount' => 'numeric'
        ]);

        $this->purchaseService->addPurchasePayment($data);
        return redirect('/purchases')->with('success', 'New payment added successfully.');
    }
}
