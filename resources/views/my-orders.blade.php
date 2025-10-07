@extends('layouts.user_panel_layout')

@section('header', 'Riwayat Pesanan Saya')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-xl">
        <h3 class="text-xl font-bold text-slate-800 mb-6 border-b pb-4">Daftar Transaksi</h3>

        <div class="space-y-6">
            @forelse ($orders as $order)
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center gap-4 transition-shadow duration-300 hover:shadow-md">
                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}" class="w-32 h-32 object-cover rounded-md flex-shrink-0">
                    <div class="flex-grow">
                        <h4 class="text-lg font-bold text-slate-800">{{ $order->product->name }}</h4>
                        <p class="text-sm text-slate-500">
                            Tanggal Pesanan: {{ $order->created_at->format('d F Y') }}
                        </p>
                        <p class="text-sm text-slate-500">
                            Order ID: #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                        </p>
                        <p class="mt-2 text-lg font-semibold text-slate-700">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="flex-shrink-0 mt-2 sm:mt-0">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full
                            @if($order->status == 'success') bg-emerald-100 text-emerald-800
                            @elseif($order->status == 'shipped') bg-blue-100 text-blue-800
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                            @else bg-amber-100 text-amber-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 border-2 border-dashed rounded-lg">
                     <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-slate-900">Belum Ada Riwayat Pesanan</h3>
                    <p class="mt-1 text-sm text-slate-500">Mulai belanja untuk melihat riwayat pesanan Anda di sini.</p>
                    <div class="mt-6">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-semibold text-sm">
                            Mulai Belanja Sekarang
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
