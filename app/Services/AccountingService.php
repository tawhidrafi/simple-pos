<?php

namespace App\Services;

use App\Models\Accounting\Account;
use App\Models\Accounting\Deposit;
use App\Models\Accounting\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class AccountingService
{
    // validation in controller and create account
    public function createNewAccount($data)
    {
        Account::create($data);
    }
    //validation in controller and update account
    public function updateAccount($account, $data)
    {
        $account->update($data);
    }
    // create new deposit and update account balance
    public function createDepositeAndUpdateBalance($data, $attachmentPath)
    {
        DB::transaction(function () use ($data, $attachmentPath) {
            $deposit = $this->createNewDeposit($data, $attachmentPath);

            $this->updateAccountBalance($data['amount'], $data['account_id'], 'add');
        });
    }
    // create new expense and update account balance
    public function createExpenseAndUpdateBalance($data, $attachmentPath)
    {
        DB::transaction(function () use ($data, $attachmentPath) {
            $deposit = $this->createNewExpense($data, $attachmentPath);

            $this->updateAccountBalance($data['amount'], $data['account_id'], 'minus');
        });
    }
    // validation in controller and create
    private function createNewDeposit($data, $attachmentPath)
    {
        Deposit::create([
            'name' => $data['name'],
            'account_id' => $data['account_id'],
            'payment_method_id' => $data['payment_method_id'],
            'ref' => $data['ref'],
            'amount' => $data['amount'],
            'date' => Carbon::now(),
            'attachment' => $attachmentPath,
            'detail' => $data['detail'],
        ]);
    }
    // validation in controller and create
    private function createNewExpense($data, $attachmentPath)
    {
        Expense::create([
            'name' => $data['name'],
            'account_id' => $data['account_id'],
            'payment_method_id' => $data['payment_method_id'],
            'expense_category_id' => $data['expense_category_id'],
            'ref' => $data['ref'],
            'amount' => $data['amount'],
            'date' => Carbon::now(),
            'attachment' => $attachmentPath,
            'detail' => $data['detail'],
        ]);
    }
    // update account balance
    private function updateAccountBalance($amount, $accountId, $operation)
    {
        $account = Account::findOrFail($accountId);

        if ($operation === 'add') {
            $account->balance += $amount;
        } elseif ($operation === 'minus') {
            $account->balance -= $amount;
        } else {
            throw new InvalidArgumentException("Invalid operation specified. Use 'add' or 'minus'.");
        }

        $account->save();
    }
}
