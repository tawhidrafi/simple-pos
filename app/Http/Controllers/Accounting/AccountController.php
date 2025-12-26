<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Accounting\Account;
use App\Services\AccountingService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    //set accountService
    protected $accountingService;
    public function __construct(AccountingService $service)
    {
        $this->accountingService = $service;
    }
    //index page
    public function index()
    {
        $accounts = Account::all();
        return view('accounting.accounts.index', compact('accounts'));
    }
    //create page
    public function create()
    {
        return view('accounting.accounts.create');
    }
    //create new account
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_name' => 'string|max:255',
            'account_number' => 'numeric|unique:accounts',
            'balance' => 'numeric',
            'details' => 'nullable|string',
        ]);
        $this->accountingService->createNewAccount($validated);
        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }
    //show single account with expense and deposits
    public function show(Account $account)
    {
        $account->load('expenses', 'deposits');
        return view('accounting.accounts.show', compact('account'));
    }
    //edit page
    public function edit(Account $account)
    {
        return view('accounting.accounts.edit', compact('account'));
    }
    //update account excluding balance
    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'account_name' => 'nullable|string|max:255',
            'account_number' => ['nullable', 'numeric', Rule::unique('accounts')->ignore($account->id)],
            'details' => 'nullable|string',
        ]);
        $this->accountingService->updateAccount($account, $validated);
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }
    //delete account
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
