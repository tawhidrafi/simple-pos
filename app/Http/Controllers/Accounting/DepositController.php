<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\StoreDepositRequest;
use App\Models\Accounting\Account;
use App\Models\Accounting\Deposit;
use App\Models\Accounting\PaymentMethod;
use App\Services\AccountingService;

class DepositController extends Controller
{
    // service definition
    protected $accountingService;
    public function __construct(AccountingService $service)
    {
        $this->accountingService = $service;
    }
    //index page
    public function index()
    {
        // collect all deposit
        $deposits = Deposit::all();
        // redirect
        return view('accounting.deposits.index', compact('deposits'));
    }
    //create page
    public function create()
    {
        // collect data
        $accounts = Account::all();
        $paymentMethods = PaymentMethod::all();
        // redirect
        return view('accounting.deposits.create', compact('accounts', 'paymentMethods'));
    }
    //create new deposit
    public function store(StoreDepositRequest $request)
    {
        // collect data
        $validated = $request->validated();
        // attachment handle
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }
        // transfer to service
        $this->accountingService->createDepositeAndUpdateBalance($validated, $attachmentPath);
        // redirect
        return redirect()->route('deposits.index')->with('success', 'Deposit recorded successfully.');
    }
}
