<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\StoreExpenseRequest;
use App\Models\Accounting\Account;
use App\Models\Accounting\Expense;
use App\Models\Accounting\ExpenseCategory;
use App\Models\Accounting\PaymentMethod;
use App\Services\AccountingService;

class ExpenseController extends Controller
{
    // service definition
    protected $accountingService;
    public function __construct(AccountingService $service)
    {
        $this->accountingService = $service;
    }
    // index page
    public function index()
    {
        // collect all expense
        $expenses = Expense::all();
        // return view
        return view('accounting.expenses.index', compact('expenses'));
    }
    // Show create form
    public function create()
    {
        //collect data
        $accounts = Account::all();
        $expenseCategories = ExpenseCategory::all();
        $paymentMethods = PaymentMethod::all();
        // return view
        return view('accounting.expenses.create', compact('accounts', 'expenseCategories', 'paymentMethods'));
    }
    // create expense
    public function store(StoreExpenseRequest $request)
    {
        // collect validated data
        $validated = $request->validated();
        // Handle attachment
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')?->store('attachments', 'public');
        }
        // trasfer to service
        $this->accountingService->createExpenseAndUpdateBalance($validated, $attachmentPath);
        // redirect
        return redirect()->route('expenses.index')->with('success', 'Expense recorded successfully.');
    }
}
