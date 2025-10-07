<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
        public function index()
    {
        // Ambil semua pesanan, beserta data user dan produk terkait
        // Urutkan dari yang paling baru dan gunakan pagination
        $orders = Order::with(['user', 'product'])->latest()->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }
    /**
     * Memperbarui status pesanan.
     */
    public function update(Request $request, Order $order)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:pending,success,shipped,cancelled', // Daftar status yang diizinkan
        ]);

        // Update status pesanan
        $order->status = $request->status;
        $order->save();

        // Redirect kembali ke halaman daftar pesanan dengan notifikasi sukses
        return redirect()->route('admin.orders.index')
                         ->with('success', 'Status pesanan berhasil diperbarui.');
    }

}
