@extends('layouts.user_panel_layout')

@section('header', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <div>
            <h2 class="text-3xl font-bold text-slate-800">Selamat Datang Kembali, {{ Auth::user()->name }}!</h2>
            <p class="text-slate-600 mt-1">Ini adalah ringkasan aktivitas belanja Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-indigo-500">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-600">Total Pesanan</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-1">{{ $orderCount }}</p>
                    </div>
                    <div class="bg-indigo-100 text-indigo-500 rounded-lg p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                </div>
            </div>

            <a href="{{ route('home') }}" class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-emerald-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-600">Lanjutkan Belanja</h3>
                        <p class="text-sm text-slate-500 mt-1">Lihat produk terbaru kami.</p>
                    </div>
                    <div class="bg-emerald-100 text-emerald-500 rounded-lg p-3">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                </div>
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-slate-800">Pesanan Terakhir Anda</h3>
                    <a href="{{ route('orders.history') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Lihat Semua Riwayat</a>
                </div>
                @if($latestOrder)
                    <div class="border rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center gap-4 bg-slate-50">
                        <img src="{{ asset('storage/' . $latestOrder->product->image) }}" alt="{{ $latestOrder->product->name }}" class="w-24 h-24 object-cover rounded-md flex-shrink-0">
                        <div class="flex-grow">
                            <h4 class="text-lg font-bold text-slate-800">{{ $latestOrder->product->name }}</h4>
                            <p class="text-sm text-slate-500">Dipesan pada: {{ $latestOrder->created_at->format('d F Y') }}</p>
                            <p class="mt-2 text-lg font-semibold text-slate-700">Rp {{ number_format($latestOrder->total_price, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex-shrink-0 mt-2 sm:mt-0">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full
                                @if($latestOrder->status == 'success') bg-emerald-100 text-emerald-800
                                @elseif($latestOrder->status == 'shipped') bg-blue-100 text-blue-800
                                @else bg-amber-100 text-amber-800 @endif">
                                Status: {{ ucfirst($latestOrder->status) }}
                            </span>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-slate-500">Anda belum pernah melakukan pesanan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
