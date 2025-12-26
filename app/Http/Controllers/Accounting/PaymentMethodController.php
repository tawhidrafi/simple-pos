<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Accounting\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    // Display a listing of the payment methods
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('accounting.payment_methods.index', compact('paymentMethods'));
    }
    // Store a newly created payment method in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:payment_methods',
        ]);
        PaymentMethod::create($validated);
        return redirect()->route('payment-methods.index')->with('success', 'Payment Method created successfully.');
    }
    // Update the specified payment method in storage
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:payment_methods,name,' . $paymentMethod->id,
        ]);
        $paymentMethod->update($validated);
        return redirect()->route('payment-methods.index')->with('success', 'Payment Method updated successfully.');
    }
    // Remove the specified payment method from storage
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('payment-methods.index')->with('success', 'Payment Method deleted successfully.');
    }
}
