<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mau Berita banG — Portal Berita Terpercaya</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 font-sans antialiased">

{{-- ══════════════════════════════════════════════════════════════════════ --}}
{{-- NAVBAR - Fixed dengan glassmorphism --}}
{{-- ══════════════════════════════════════════════════════════════════════ --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl shadow-sm border-b border-white/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- Logo & Brand --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl blur-lg opacity-50 group-hover:opacity-75 transition"></div>
                    <div class="relative bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 p-3 rounded-2xl shadow-lg group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.586a1 1 0 00-.293-.707l-2.414-2.414A1 1 0 0020.586 6H18a2 2 0 00-2 2v11a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                        MBG News
                    </h1>
                    <p class="text-xs text-gray-500 font-medium -mt-1">Mau Berita banG</p>
                </div>
            </a>

            {{-- Actions --}}
            <div class="flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="hidden sm:flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="hidden lg:inline">Dashboard</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-4 py-2.5 text-sm font-semibold text-red-600 hover:bg-red-50 rounded-xl transition-all">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="relative overflow-hidden group px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                        <span class="relative z-10">Daftar Gratis</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>

{{-- Spacer untuk fixed navbar --}}
<div class="h-20"></div>

{{-- ══════════════════════════════════════════════════════════════════════ --}}
{{-- HERO SECTION - Eye-catching dengan animated gradient --}}
{{-- ══════════════════════════════════════════════════════════════════════ --}}
<section class="relative overflow-hidden">
    {{-- Animated Background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 -left-4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
            <div class="absolute top-0 -right-4 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-4000"></div>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="text-center text-white">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-6">
                <span class="flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-sm font-medium">Portal Berita Terpercaya</span>
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                Mau Berita <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-pink-300">banG?</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 font-medium mb-8 max-w-3xl mx-auto leading-relaxed">
                Baca artikel terkini dari berbagai kategori. 
                <span class="text-white font-bold">Gratis</span> dan 
                <span class="text-white font-bold">Update Setiap Hari!</span>
            </p>

            {{-- Stats --}}
            <div class="flex flex-wrap items-center justify-center gap-8 mt-12">
                <div class="text-center">
                    <div class="text-4xl font-black text-white mb-1">{{ number_format($articles->total()) }}</div>
                    <div class="text-sm text-blue-200 font-medium">Artikel</div>
                </div>
                <div class="w-px h-12 bg-white/20"></div>
                <div class="text-center">
                    <div class="text-4xl font-black text-white mb-1">{{ $categories->count() }}</div>
                    <div class="text-sm text-blue-200 font-medium">Kategori</div>
                </div>
                <div class="w-px h-12 bg-white/20"></div>
                <div class="text-center">
                    <div class="text-4xl font-black text-white mb-1">{{ number_format($totalReaders) }}+</div>
                    <div class="text-sm text-blue-200 font-medium">Total Views</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave Divider --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-16 md:h-24 text-slate-50" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="currentColor"></path>
        </svg>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════════════════ --}}
{{-- SEARCH & FILTER - Modern dengan glassmorphism --}}
{{-- ══════════════════════════════════════════════════════════════════════ --}}
<section class="relative -mt-20 mb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-6 lg:p-8">
            <form method="GET" action="{{ route('home') }}" class="space-y-4">
                <div class="flex flex-col lg:flex-row gap-3">
                    
                    {{-- Search Bar --}}
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Cari artikel, topik, atau penulis..."
                               class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 transition-all text-sm font-medium placeholder-gray-400">
                    </div>

                    {{-- Category Filter --}}
                    <select name="category"
                            class="px-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 transition-all text-sm font-medium text-gray-700 cursor-pointer">
                        <option value="">📂 Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Search Button --}}
                    <button type="submit"
                            class="px-8 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                        <span class="hidden sm:inline">Cari</span>
                        <span class="sm:hidden">🔍</span>
                    </button>
                </div>

                {{-- Active Filters --}}
                @if(request()->anyFilled(['search','category']))
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-xs text-gray-500 font-medium">Filter aktif:</span>
                        @if(request('search'))
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                "{{ Str::limit(request('search'), 20) }}"
                                <button type="button" onclick="document.querySelector('input[name=search]').value=''; this.closest('form').submit();" class="hover:text-blue-900">×</button>
                            </span>
                        @endif
                        @if(request('category'))
                            @php $selectedCat = $categories->firstWhere('id', request('category')); @endphp
                            @if($selectedCat)
                                <span class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold">
                                    {{ $selectedCat->name }}
                                    <button type="button" onclick="document.querySelector('select[name=category]').value=''; this.closest('form').submit();" class="hover:text-purple-900">×</button>
                                </span>
                            @endif
                        @endif
                        <a href="{{ route('home') }}" class="text-xs text-red-500 hover:text-red-700 font-semibold hover:underline">
                            Reset Semua
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════════════════ --}}
{{-- ARTICLES GRID - Modern card design --}}
{{-- ══════════════════════════════════════════════════════════════════════ --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">

    {{-- Result Summary --}}
    @if(request()->anyFilled(['search','category']))
        <div class="mb-8 p-4 bg-white/80 backdrop-blur-sm rounded-2xl border border-gray-100">
            <p class="text-sm text-gray-600">
                Menampilkan <span class="font-bold text-blue-600">{{ $articles->total() }}</span> hasil
                @if(request('search')) untuk pencarian <span class="font-bold">"{{ request('search') }}"</span>@endif
                @if(request('category'))
                    @php $selectedCat = $categories->firstWhere('id', request('category')); @endphp
                    @if($selectedCat) dalam kategori <span class="font-bold text-purple-600">{{ $selectedCat->name }}</span>@endif
                @endif
            </p>
        </div>
    @endif

    @if($articles->isEmpty())
        {{-- Empty State --}}
        <div class="text-center py-20">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak ada artikel ditemukan</h3>
            <p class="text-gray-500 mb-6">Coba ubah kata kunci atau filter pencarian Anda</p>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Lihat Semua Artikel
            </a>
        </div>
    @else
        {{-- Articles Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($articles as $article)
                <article class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col transform hover:-translate-y-1">
                    
                    {{-- Thumbnail with Overlay --}}
                    <div class="relative overflow-hidden aspect-video">
                        @if($article->thumbnail)
                            <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                 alt="{{ $article->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        @endif
                        
                        {{-- Category Badge --}}
                        <div class="absolute top-3 left-3">
                            <a href="{{ route('home', ['category' => $article->category->id]) }}"
                               class="inline-block px-3 py-1.5 bg-white/90 backdrop-blur-sm text-xs font-bold text-blue-600 rounded-full shadow-lg hover:bg-white transition-all">
                                {{ $article->category->name }}
                            </a>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 flex flex-col flex-1">
                        
                        {{-- Title --}}
                        <h3 class="text-xl font-bold text-gray-800 leading-tight mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                            <a href="{{ route('artikel.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-gray-600 text-sm leading-relaxed flex-1 line-clamp-3 mb-4">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                        </p>

                        {{-- Meta Info --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xs font-bold">
                                    {{ strtoupper(substr($article->user->name, 0, 1)) }}
                                </div>
                                <div class="text-xs">
                                    <div class="font-semibold text-gray-700">{{ Str::limit($article->user->name, 15) }}</div>
                                    <div class="text-gray-400 flex items-center gap-2">
                                        <span>{{ $article->published_at?->format('d M Y') ?? $article->created_at->format('d M Y') }}</span>
                                        <span>•</span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            {{ number_format($article->views_count) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="{{ route('artikel.show', $article) }}"
                               class="flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 group-hover:gap-2 transition-all">
                                <span>Baca</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    @endif

</section>

{{-- ══════════════════════════════════════════════════════════════════════ --}}
{{-- FOOTER - Simple & Clean --}}
{{-- ══════════════════════════════════════════════════════════════════════ --}}
<footer class="bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        {{-- Brand & About --}}
        <div class="text-center mb-8">
            <h3 class="text-2xl font-black mb-2">MBG News</h3>
            <p class="text-blue-200 text-sm mb-6">Mau Berita banG — Portal Berita Terpercaya</p>
            
            {{-- Tentang Kami --}}
            <div class="max-w-2xl mx-auto">
                <h4 class="text-lg font-bold text-white mb-3">Tentang Kami</h4>
                <p class="text-blue-200 text-sm leading-relaxed">
                    MBG News adalah portal berita digital yang menyajikan informasi terkini dan terpercaya 
                    dari berbagai kategori. Kami berkomitmen untuk memberikan berita berkualitas yang informatif, 
                    akurat, dan mudah diakses oleh semua kalangan.
                </p>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="pt-8 border-t border-white/10 text-center text-sm text-blue-200">
            <p>&copy; 2026 <strong class="text-white">MBG News</strong>. All rights reserved.</p>
        </div>
        
    </div>
</footer>

</body>
</html>
