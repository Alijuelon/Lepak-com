<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data ringkasan.
     */
    public function dashboard()
    {
        // Hitung total produk
        $productCount = Product::count();

        // Hitung total pesanan
        $orderCount = Order::count();

        // Hitung total pendapatan dari pesanan yang statusnya 'success' atau 'shipped'
        $totalRevenue = Order::whereIn('status', ['success', 'shipped'])->sum('total_price');

        // Ambil 5 pesanan terbaru untuk ditampilkan di dashboard
        $recentOrders = Order::with(['user', 'product'])->latest()->take(5)->get();

        // Kirim semua data ke view
        return view("admin.dashboard", compact(
            'productCount',
            'orderCount',
            'totalRevenue',
            'recentOrders'
        ));
    }
}
