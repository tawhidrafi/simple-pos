<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseReturn;
use App\Models\Sale\Sale;
use App\Models\Sale\SaleReturn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // dashboard page
    public function index()
    {
        $totalSales = Sale::sum('total');
        $totalPurchases = Purchase::sum('total');
        $totalSaleReturns = SaleReturn::sum('total');
        $totalPurchaseReturns = PurchaseReturn::sum('total');
        $totalProducts = Product::count();
        $totalVariants = Variant::count();
        $totalprod = $totalProducts + $totalVariants;

        // Daily
        $salesToday = Sale::whereDate('created_at', today())->sum('total');
        $purchasesToday = Purchase::whereDate('created_at', today())->sum('total');

        return view('user.dashboard', compact('totalSales', 'totalPurchases', 'totalSaleReturns', 'totalPurchaseReturns', 'totalprod', 'salesToday', 'purchasesToday'));
    }
    // profile page
    public function profile()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }
    // update profile details
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|numeric|regex:/^01[3-9]\d{8}$/|unique:users,phone,' . $user->id,
            'address' => 'nullable|string',
        ]);

        $user->update(array_filter($validated));

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    // update password
    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
    // update profile picture
    public function updateProfilePicture(Request $request, User $user)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $path = $request->file('photo')->store('images', 'public');

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->update(['photo' => $path]);

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }
}
