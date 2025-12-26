<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Accounting\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    // index page
    public function index()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('accounting.expense_categories.index', compact('expenseCategories'));
    }
    // create category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories',
        ]);
        ExpenseCategory::create($validated);
        return redirect()->route('expense-categories.index')->with('success', 'Expense Category created successfully.');
    }
    // single category, expense list
    public function show(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->load('expenses');
        return view('accounting.expense_categories.show', compact('expenseCategory'));
    }
    // update category
    public function update(Request $request, ExpenseCategory $expenseCategory)
    {
        $validated = $request->validate([
            'name' => 'string|max:255|unique:expense_categories,name,' . $expenseCategory->id,
        ]);
        $expenseCategory->update($validated);
        return redirect()->route('expense-categories.index')->with('success', 'Expense Category updated successfully.');
    }
    //delete category
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();
        return redirect()->route('expense-categories.index')->with('success', 'Expense Category deleted successfully.');
    }
}
