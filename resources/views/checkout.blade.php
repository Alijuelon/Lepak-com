@extends('layouts.user_panel_layout')

@section('header', 'Konfirmasi Pesanan')

@section('content')
    <div class="bg-white p-8 rounded-xl shadow-xl">
        <h2 class="text-3xl font-bold text-slate-800 mb-6 border-b pb-4">Checkout</h2>

        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="{{ $quantity }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-700 mb-4">Ringkasan Pesanan Anda</h3>
                        <div class="border rounded-lg p-4 flex flex-col sm:flex-row items-start gap-4 bg-slate-50">
                            <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover rounded-md flex-shrink-0">
                            <div class="flex-1">
                                <h4 class="text-lg font-bold text-slate-800">{{ $product->name }}</h4>
                                <p class="text-sm text-slate-500">Kuantitas: {{ $quantity }} Unit</p>
                                <p class="mt-2 text-lg font-semibold text-slate-700">Rp {{ number_format($product->price, 0, ',', '.') }} / unit</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-slate-700 mb-4">Alamat Pengiriman</h3>
                        <textarea name="shipping_address" id="shipping_address" rows="4" class="block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Masukkan alamat lengkap Anda (Jalan, No. Rumah, Kecamatan, Kota, Kode Pos)" required>{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-slate-50 p-6 rounded-lg border">
                        <h3 class="text-lg font-semibold text-slate-700 mb-4">Detail Pembayaran</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between text-slate-600">
                                <span>Subtotal ({{ $quantity }} x {{ number_format($product->price, 0, ',', '.') }})</span>
                                <span>Rp {{ number_format($total_price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Biaya Pengiriman</span>
                                <span class="font-medium text-emerald-600">Gratis</span>
                            </div>

                            <div class="border-t pt-3 mt-3">
                                <h4 class="text-sm font-semibold text-slate-700 mb-2">Metode Pembayaran</h4>
                                <div class="flex items-center justify-between p-3 bg-white border rounded-lg">
                                    <span class="font-medium text-slate-800">Cash on Delivery (COD)</span>
                                    <i data-lucide="hand-coins" class="w-5 h-5 text-indigo-600"></i>
                                </div>
                            </div>

                            <div class="border-t pt-3 mt-3 flex justify-between font-bold text-slate-800 text-lg">
                                <span>Total Pembayaran</span>
                                <span>Rp {{ number_format($total_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <button type="submit" class="mt-6 w-full inline-flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-semibold text-base transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Buat Pesanan (COD)
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>lucide.createIcons();</script>
@endsection
