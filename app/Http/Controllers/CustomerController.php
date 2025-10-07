<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function dashboard()
    {
        // Dapatkan data user yang sedang login
        $user = Auth::user();

        // Hitung total pesanan milik user tersebut
        $orderCount = Order::where('user_id', $user->id)->count();

        // Ambil 1 pesanan terakhir beserta data produknya (Eager Loading)
        $latestOrder = Order::where('user_id', $user->id)
                            ->with('product')
                            ->latest()
                            ->first();

        // Kirim semua data ke view 'customer.dashboard'
        return view('dashboard', compact('user', 'orderCount', 'latestOrder'));
    }
}
