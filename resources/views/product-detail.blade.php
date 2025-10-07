<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - Lepak Komputer Shop</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Anda bisa pindahkan style ini ke file CSS utama jika mau */
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <header class="sticky inset-x-0 top-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <nav class="flex items-center justify-between p-6 lg:px-8 max-w-7xl mx-auto" aria-label="Global">
            <div class="flex lg:flex-1 items-center gap-3">
                <a href="/" class="-m-1.5 p-1.5 flex items-center gap-3 group">
                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i data-lucide="cpu" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Lepak</h2>
                        <p class="text-xs text-gray-500 -mt-1">Komputer Shop</p>
                    </div>
                </a>
            </div>
            <div class="flex lg:flex-1 lg:justify-end gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 text-sm font-semibold leading-6 text-white bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition-colors flex items-center gap-2">
                            <i data-lucide="log-in" class="w-4 h-4"></i>
                            Log in
                        </a>
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <main class="py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <nav class="text-sm mb-8" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex items-center gap-2">
                    <li class="flex items-center">
                        <a href="/" class="text-gray-500 hover:text-indigo-600">Home</a>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                    </li>
                    <li class="flex items-center">
                        <a href="/#products" class="text-gray-500 hover:text-indigo-600">Produk</a>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                    </li>
                    <li class="text-gray-700 font-semibold truncate">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
                <div>
                    <div class="aspect-square w-full bg-white rounded-2xl shadow-xl overflow-hidden mb-4">
                         <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="aspect-square bg-white rounded-lg p-1 border-2 border-indigo-500"><img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover rounded"></div>
                        <div class="aspect-square bg-white rounded-lg p-1 border border-gray-200 opacity-60 hover:opacity-100 cursor-pointer"><img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover rounded"></div>
                        <div class="aspect-square bg-white rounded-lg p-1 border border-gray-200 opacity-60 hover:opacity-100 cursor-pointer"><img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover rounded"></div>
                        <div class="aspect-square bg-white rounded-lg p-1 border border-gray-200 opacity-60 hover:opacity-100 cursor-pointer"><img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover rounded"></div>
                    </div>
                </div>

                <div x-data="{ quantity: 1 }">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl mb-3">{{ $product->name }}</h1>
                    <div class="flex items-center gap-1 mb-4">
                        <div class="flex text-yellow-400">
                           <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                           <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                           <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                           <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                           <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                        </div>
                        <span class="text-sm text-gray-600 ml-2">(120 Reviews)</span>
                    </div>
                    <p class="text-4xl font-bold text-indigo-600 mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600 leading-relaxed mb-6">{{ Str::limit($product->description, 200) }}</p>

                    <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700 mb-6">
                        <i data-lucide="package-check" class="w-4 h-4"></i>
                        Stok Tersedia: {{ $product->stock }}
                    </span>

                    <div class="flex items-center gap-4 mb-8">
                        <div class="font-semibold">Kuantitas:</div>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <button @click="quantity = Math.max(1, quantity - 1)" class="p-2 text-gray-500 hover:text-indigo-600"><i data-lucide="minus" class="w-4 h-4"></i></button>
                            <input type="text" x-model="quantity" class="w-12 text-center border-none focus:ring-0 font-bold">
                            <button @click="quantity = Math.min({{ $product->stock }}, quantity + 1)" class="p-2 text-gray-500 hover:text-indigo-600"><i data-lucide="plus" class="w-4 h-4"></i></button>
                        </div>
                    </div>

                    @auth
                   <div x-data="{ quantity: 1 }">
    <form action="{{ route('checkout', $product) }}" method="GET">
        <input type="hidden" name="quantity" x-model="quantity">
        <button type="submit" class="flex items-center justify-center gap-3 w-full rounded-xl bg-indigo-600 px-8 py-4 text-base font-semibold text-white shadow-lg hover:bg-indigo-700 transition-all hover:scale-105">
            <i data-lucide="shopping-bag" class="w-5 h-5"></i>
            Beli Sekarang
        </button>
    </form>
</div>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-3 w-full rounded-xl bg-gray-400 px-8 py-4 text-base font-semibold text-white shadow-lg hover:bg-gray-500 transition-all">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                            Login untuk Beli
                        </a>
                    @endauth
                </div>
            </div>

            <div x-data="{ tab: 'description' }" class="mt-20">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex gap-6" aria-label="Tabs">
                        <button @click="tab = 'description'" :class="{ 'border-indigo-500 text-indigo-600': tab === 'description', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'description' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Deskripsi Lengkap</button>
                        <button @click="tab = 'reviews'" :class="{ 'border-indigo-500 text-indigo-600': tab === 'reviews', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'reviews' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Ulasan</button>
                    </nav>
                </div>
                <div class="py-8">
                    <div x-show="tab === 'description'" class="prose max-w-none text-gray-600">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div x-show="tab === 'reviews'" x-cloak class="text-gray-600">
                        <p>Fitur ulasan akan segera hadir!</p>
                    </div>
                </div>
            </div>

            <div class="mt-20">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 mb-8">Anda Mungkin Juga Suka</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($relatedProducts as $related)
                        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <a href="{{ route('product.show', $related) }}">
                                <div class="relative aspect-square w-full overflow-hidden bg-gray-200">
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" class="h-full w-full object-cover object-center transition-transform duration-300 group-hover:scale-110">
                                </div>
                                <div class="p-6">
                                    <h3 class="text-base font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition-colors">{{ $related->name }}</h3>
                                    <p class="text-xl font-bold text-indigo-600">Rp {{ number_format($related->price, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-gray-900 text-white py-12">
        </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
