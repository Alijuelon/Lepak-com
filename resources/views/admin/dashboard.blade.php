<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Overview') }}
    </x-slot>

    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-indigo-500">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-600">Total Produk</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-1">{{ $productCount }}</p>
                    </div>
                    <div class="bg-indigo-100 text-indigo-500 rounded-lg p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-amber-500">
                 <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-600">Total Pesanan</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-1">{{ $orderCount }}</p>
                    </div>
                    <div class="bg-amber-100 text-amber-500 rounded-lg p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-emerald-500">
                 <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-600">Total Pendapatan</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-emerald-100 text-emerald-500 rounded-lg p-3">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1m0-1V4m0 2v1m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M12 8V7m0 1v.01M12 6v-1m0-1V4m0 2v1m0 0v1"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-slate-800">Pesanan Terbaru</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Lihat Semua Pesanan</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b-2 border-slate-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentOrders as $order)
                                <tr class="odd:bg-white even:bg-slate-50 border-b border-slate-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $order->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full
                                            @if($order->status == 'success') bg-emerald-100 text-emerald-800
                                            @elseif($order->status == 'shipped') bg-blue-100 text-blue-800
                                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                            @else bg-amber-100 text-amber-800 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-slate-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-slate-500">
                                        Belum ada pesanan yang masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
