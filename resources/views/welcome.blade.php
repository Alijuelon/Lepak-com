<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lepak Komputer Shop - Toko Komputer Terpercaya</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slide-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .animate-fade-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-pulse-slow {
            animation: pulse-slow 2s ease-in-out infinite;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <header class="fixed inset-x-0 top-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <nav class="flex items-center justify-between p-6 lg:px-8 max-w-7xl mx-auto" aria-label="Global">
            <div class="flex lg:flex-1 items-center gap-3">
                <a href="/" class="-m-1.5 p-1.5 flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i data-lucide="cpu" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Lepak</h2>
                        <p class="text-xs text-gray-500 -mt-1">Komputer Shop</p>
                    </div>
                </a>
            </div>

            <div class="hidden lg:flex lg:gap-x-8">
                <a href="#products"
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition-colors">Produk</a>
                <a href="#features"
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition-colors">Layanan</a>
                <a href="#about"
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition-colors">Tentang</a>
                <a href="#contact"
                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition-colors">Kontak</a>
            </div>

            <div class="flex lg:flex-1 lg:justify-end gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="flex items-center gap-2 text-sm font-semibold leading-6 text-white bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition-colors flex items-center gap-2">
                            <i data-lucide="log-in" class="w-4 h-4"></i>
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-sm font-semibold leading-6 text-white bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors flex items-center gap-2">
                                <i data-lucide="user-plus" class="w-4 h-4"></i>
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <main class="isolate">
        <!-- Hero Section -->
        <div class="relative pt-20 overflow-hidden">
            <div class="blob w-96 h-96 bg-purple-400 top-0 -left-48"></div>
            <div class="blob w-96 h-96 bg-indigo-400 top-20 -right-48" style="animation-delay: 2s;"></div>

            <div class="py-24 sm:py-32 relative">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl text-center">
                        <div class="mb-8 animate-fade-up">
                            <span
                                class="inline-flex items-center gap-2 rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
                                <i data-lucide="zap" class="w-4 h-4"></i>
                                Toko Komputer Terpercaya #1
                            </span>
                        </div>
                        <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-7xl mb-6 animate-fade-up"
                            style="animation-delay: 0.1s;">
                            Temukan <span class="gradient-text">Komputer Impian</span> Anda
                        </h1>
                        <p class="mt-6 text-xl leading-8 text-gray-600 animate-fade-up" style="animation-delay: 0.2s;">
                            Koleksi terlengkap PC Gaming, Laptop, dan Aksesoris untuk kebutuhan gaming, profesional, dan
                            sehari-hari dengan harga terbaik!
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6 animate-fade-up"
                            style="animation-delay: 0.3s;">
                            <a href="#products"
                                class="rounded-lg bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-lg hover:bg-indigo-700 transition-all hover:scale-105 flex items-center gap-2">
                                <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                                Belanja Sekarang
                            </a>
                            <a href="#about"
                                class="text-base font-semibold leading-7 text-gray-900 hover:text-indigo-600 transition-colors flex items-center gap-2">
                                Pelajari Lebih Lanjut
                                <i data-lucide="arrow-right" class="w-5 h-5"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="mx-auto mt-20 max-w-5xl">
                        <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg card-hover">
                                <i data-lucide="users" class="w-10 h-10 text-indigo-600 mb-3"></i>
                                <div class="text-3xl font-bold text-gray-900">5000+</div>
                                <div class="text-sm text-gray-600 mt-1">Pelanggan Puas</div>
                            </div>
                            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg card-hover">
                                <i data-lucide="package" class="w-10 h-10 text-indigo-600 mb-3"></i>
                                <div class="text-3xl font-bold text-gray-900">1000+</div>
                                <div class="text-sm text-gray-600 mt-1">Produk Tersedia</div>
                            </div>
                            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg card-hover">
                                <i data-lucide="award" class="w-10 h-10 text-indigo-600 mb-3"></i>
                                <div class="text-3xl font-bold text-gray-900">10+</div>
                                <div class="text-sm text-gray-600 mt-1">Tahun Pengalaman</div>
                            </div>
                            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg card-hover">
                                <i data-lucide="star" class="w-10 h-10 text-indigo-600 mb-3"></i>
                                <div class="text-3xl font-bold text-gray-900">4.9/5</div>
                                <div class="text-sm text-gray-600 mt-1">Rating Pelanggan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div id="features" class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                        Kenapa Pilih <span class="gradient-text">Lepak</span>?
                    </h2>
                    <p class="mt-4 text-lg text-gray-600">
                        Kami memberikan pelayanan terbaik untuk kebutuhan komputer Anda
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative p-8 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl card-hover">
                        <div class="w-14 h-14 gradient-bg rounded-xl flex items-center justify-center mb-6">
                            <i data-lucide="shield-check" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Garansi Resmi</h3>
                        <p class="text-gray-600">Semua produk bergaransi resmi dengan layanan after-sales terpercaya
                        </p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl card-hover">
                        <div class="w-14 h-14 gradient-bg rounded-xl flex items-center justify-center mb-6">
                            <i data-lucide="truck" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Pengiriman Cepat</h3>
                        <p class="text-gray-600">Free ongkir untuk pembelian tertentu dengan pengiriman yang aman dan
                            cepat</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl card-hover">
                        <div class="w-14 h-14 gradient-bg rounded-xl flex items-center justify-center mb-6">
                            <i data-lucide="headphones" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Support 24/7</h3>
                        <p class="text-gray-600">Tim customer service siap membantu Anda kapan saja</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl card-hover">
                        <div class="w-14 h-14 gradient-bg rounded-xl flex items-center justify-center mb-6">
                            <i data-lucide="wallet" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Harga Kompetitif</h3>
                        <p class="text-gray-600">Dapatkan harga terbaik dengan kualitas produk original dan terjamin
                        </p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl card-hover">
                        <div class="w-14 h-14 gradient-bg rounded-xl flex items-center justify-center mb-6">
                            <i data-lucide="wrench" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Custom PC Builder</h3>
                        <p class="text-gray-600">Konsultasi gratis untuk rakit PC sesuai kebutuhan dan budget Anda</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl card-hover">
                        <div class="w-14 h-14 gradient-bg rounded-xl flex items-center justify-center mb-6">
                            <i data-lucide="tag" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Promo Menarik</h3>
                        <p class="text-gray-600">Nikmati berbagai promo dan diskon spesial setiap bulannya</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div id="products" class="bg-gray-50 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex items-center justify-between mb-16">
                    <div>
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900">Produk Pilihan</h2>
                        <p class="mt-2 text-lg text-gray-600">Koleksi produk terbaik kami untuk Anda</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="p-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition-colors">
                            <i data-lucide="sliders-horizontal" class="w-5 h-5 text-gray-600"></i>
                        </button>
                        <button class="p-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition-colors">
                            <i data-lucide="grid-3x3" class="w-5 h-5 text-gray-600"></i>
                        </button>
                    </div>
                </div>

                @if (session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8 rounded-lg flex items-center gap-3"
                        role="alert">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                        <span class="text-green-800">{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded-lg flex items-center gap-3"
                        role="alert">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-500"></i>
                        <span class="text-red-800">{{ session('error') }}</span>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @forelse ($products as $product)
                        <a href="{{ route('product.show', $product) }}" class="group block">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full flex flex-col">
                                <div class="relative aspect-square w-full overflow-hidden bg-gray-200">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="h-full w-full object-cover object-center transition-transform duration-300 group-hover:scale-110">
                                    <div class="absolute top-4 right-4">
                                        <div
                                            class="w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center">
                                            <i data-lucide="heart" class="w-5 h-5 text-gray-400"></i>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-4 left-4">
                                        <span
                                            class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-lucide="zap" class="w-3 h-3 inline"></i> Best Seller
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-1 mb-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                        <span class="text-xs text-gray-600 ml-2">(4.9)</span>
                                    </div>
                                    <h3
                                        class="text-base font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                                        {{ $product->name }}</h3>
                                    <div class="flex items-baseline gap-2 mb-4">
                                        <p class="text-2xl font-bold text-indigo-600">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="mt-auto pt-4">
                                        <div
                                            class="flex items-center justify-center gap-2 w-full rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-lg transition-colors group-hover:bg-indigo-700">
                                            <i data-lucide="search" class="w-4 h-4"></i>
                                            Lihat Detail
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <i data-lucide="inbox" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                            <p class="text-gray-500">Saat ini belum ada produk yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div id="about" class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900 mb-6">
                            Tentang <span class="gradient-text">Lepak Komputer Shop</span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-6">
                            Lepak Komputer Shop adalah toko komputer terpercaya yang telah melayani ribuan pelanggan di
                            seluruh Indonesia sejak tahun 2014. Kami berkomitmen untuk menyediakan produk berkualitas
                            tinggi dengan harga yang kompetitif.
                        </p>
                        <p class="text-lg text-gray-600 mb-8">
                            Dengan tim yang berpengalaman dan profesional, kami siap membantu Anda menemukan solusi
                            teknologi yang tepat untuk kebutuhan gaming, pekerjaan, maupun pendidikan.
                        </p>
                        <div class="flex gap-4">
                            <a href="#contact"
                                class="flex items-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-lg hover:bg-indigo-700 transition-all hover:scale-105">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="aspect-square rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=800"
                                alt="Toko" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="absolute -bottom-6 -left-6 w-40 h-40 gradient-bg rounded-3xl flex items-center justify-center shadow-2xl animate-float">
                            <div class="text-center text-white">
                                <div class="text-4xl font-bold">10+</div>
                                <div class="text-sm">Tahun</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="bg-gray-50 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-4xl font-bold tracking-tight text-gray-900 mb-4">Hubungi Kami</h2>
                    <p class="text-lg text-gray-600">Punya pertanyaan? Tim kami siap membantu Anda!</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                        <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="map-pin" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Alamat</h3>
                        <p class="text-gray-600">Jl. Teknologi No. 123<br>Jakarta Selatan, 12345</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                        <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="phone" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Telepon</h3>
                        <p class="text-gray-600">+62 812-3456-7890<br>+62 21-1234-5678</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                        <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="mail" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Email</h3>
                        <p class="text-gray-600">info@lepakshop.com<br>support@lepakshop.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                                <i data-lucide="cpu" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold">Lepak Komputer Shop</h3>
                                <p class="text-sm text-gray-400">Toko Komputer Terpercaya</p>
                            </div>
                        </div>
                        <p class="text-gray-400 mb-4">Solusi terbaik untuk kebutuhan komputer, gaming, dan teknologi
                            Anda dengan harga kompetitif dan pelayanan terbaik.</p>
                        <div class="flex gap-4">
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <i data-lucide="facebook" class="w-5 h-5"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <i data-lucide="instagram" class="w-5 h-5"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <i data-lucide="twitter" class="w-5 h-5"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <i data-lucide="youtube" class="w-5 h-5"></i>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg mb-4">Menu</h4>
                        <ul class="space-y-2">
                            <li><a href="#products"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Produk</a></li>
                            <li><a href="#features"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Layanan</a></li>
                            <li><a href="#about"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Tentang</a></li>
                            <li><a href="#contact"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Kontak</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg mb-4">Kategori</h4>
                        <ul class="space-y-2">
                            <li><a href="#"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> PC Gaming</a></li>
                            <li><a href="#"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Laptop</a></li>
                            <li><a href="#"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Aksesoris</a></li>
                            <li><a href="#"
                                    class="text-gray-400 hover:text-white transition-colors flex items-center gap-2"><i
                                        data-lucide="chevron-right" class="w-4 h-4"></i> Peripheral</a></li>
                        </ul>
                    </div>
                </div>

                <div
                    class="border-t border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-gray-400 text-sm">© 2025 Lepak Komputer Shop. All rights reserved.</p>
                    <p class="text-gray-500 text-sm flex items-center gap-2">
                        <i data-lucide="code" class="w-4 h-4"></i>
                        Designed by <span class="text-indigo-400 font-semibold">gilangXadit</span>
                    </p>
                </div>
            </div>
        </footer>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.card-hover').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease-out';
            observer.observe(card);
        });
    </script>
</body>

</html>
