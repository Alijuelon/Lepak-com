<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Menampilkan halaman utama dengan semua produk
    public function index()
    {
        $products = Product::where('stock', '>', 0)->latest()->paginate(8);
        // Pastikan view() mengarah ke 'welcome'
        return view('welcome', compact('products'));
    }

    // Menampilkan halaman konfirmasi checkout
    /**
     * Menampilkan halaman konfirmasi checkout
     */
    public function checkout(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1); // Ambil kuantitas, default 1
        $total_price = $product->price * $quantity;

        return view('checkout', compact('product', 'quantity', 'total_price'));
    }

    /**
     * Memproses pesanan
     */
    public function placeOrder(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|string|min:10',
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;

        // 2. Cek Stok Kembali
        if ($product->stock < $quantity) {
            return back()->with('error', 'Maaf, stok produk tidak mencukupi untuk kuantitas yang Anda minta.');
        }

        // 3. Hitung Total Harga
        $total_price = $product->price * $quantity;

        // 4. Buat Pesanan Baru
        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'total_price' => $total_price,
            'shipping_address' => $request->shipping_address,
            'payment_method' => 'cod', // Sesuai permintaan
            'status' => 'pending', // Status awal saat pesanan dibuat
        ]);

        // 5. Kurangi Stok Produk
        $product->decrement('stock', $quantity);

        return redirect()->route('orders.history')->with('success', 'Pesanan Anda berhasil dibuat dan akan segera diproses!');
    }
    public function show(Product $product)
    {
        // Mengambil beberapa produk lain secara acak sebagai "Produk Terkait"
        // Memastikan produk yang sedang dilihat tidak ikut tampil
        $relatedProducts = Product::where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
    public function orderHistory()
    {
        // Ambil ID user yang sedang login
        $userId = Auth::id();

        // Ambil semua pesanan milik user tersebut, beserta data produk terkait
        // Urutkan dari yang paling baru
        $orders = Order::where('user_id', $userId)
            ->with('product') // Eager loading untuk mengambil data produk
            ->latest()
            ->paginate(10);

        // Kirim data pesanan ke view
        return view('my-orders', compact('orders'));
    }
}
