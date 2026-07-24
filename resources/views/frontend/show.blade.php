<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} — MBG</title>
    <meta name="description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

{{-- ── Navbar ──────────────────────────────────────────────────────────── --}}
<nav class="bg-white/90 backdrop-blur-lg shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">

        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 p-2 rounded-xl shadow-lg group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <div class="hidden sm:block">
                <span class="text-xl font-extrabold text-gray-800">MBG</span>
                <span class="text-sm text-gray-500 ml-1">| Mau Berita banG</span>
            </div>
        </a>

        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition">Masuk</a>
                <a href="{{ route('register') }}"
                   class="px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all">
                    Daftar
                </a>
            @endauth
        </div>

    </div>
</nav>

<div class="max-w-4xl mx-auto px-4 py-10">

    {{-- Breadcrumb --}}
    <nav class="text-sm text-gray-400 mb-6 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
        <span>›</span>
        <a href="{{ route('home', ['category' => $article->category_id]) }}"
           class="hover:text-blue-600 transition">{{ $article->category->name }}</a>
        <span>›</span>
        <span class="text-gray-600 truncate max-w-xs">{{ $article->title }}</span>
    </nav>

    {{-- Artikel Utama --}}
    <article class="bg-white rounded-2xl shadow overflow-hidden">

        {{-- Thumbnail --}}
        @if($article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}"
                 alt="{{ $article->title }}"
                 class="w-full max-h-96 object-cover">
        @endif

        <div class="p-8">

            {{-- Flash message --}}
            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-300 p-4 text-green-700 text-sm">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Kategori badge --}}
            <a href="{{ route('home', ['category' => $article->category_id]) }}"
               class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full hover:bg-blue-200 transition">
                {{ $article->category->name }}
            </a>

            {{-- Judul --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-4 leading-snug">
                {{ $article->title }}
            </h1>

            {{-- Excerpt --}}
            @if($article->excerpt)
                <p class="mt-3 text-lg text-gray-500 leading-relaxed">
                    {{ $article->excerpt }}
                </p>
            @endif

            {{-- Meta penulis & tanggal --}}
            <div class="flex flex-wrap items-center gap-5 mt-5 text-sm text-gray-400 border-t border-b py-4">
                <span class="flex items-center gap-1">
                    <span>✍️</span>
                    <strong class="text-gray-700">{{ $article->user->name }}</strong>
                </span>
                <span class="flex items-center gap-1">
                    <span>📅</span>
                    {{ $article->published_at?->format('d M Y, H:i') ?? $article->created_at->format('d M Y, H:i') }}
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <strong class="text-gray-700">{{ number_format($article->views_count) }}</strong> views
                </span>
                <span class="flex items-center gap-1">
                    <span>💬</span>
                    {{ $article->comments->count() }} komentar
                </span>
            </div>

            {{-- Isi artikel --}}
            <div class="prose prose-lg max-w-none mt-8 text-gray-700 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>

        </div>
    </article>

    {{-- ── Artikel Terkait ────────────────────────────────────────────── --}}
    @if($related->isNotEmpty())
    <section class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Artikel Terkait</h2>
        <div class="grid md:grid-cols-3 gap-5">
            @foreach($related as $rel)
                <a href="{{ route('artikel.show', $rel) }}"
                   class="bg-white rounded-xl shadow hover:shadow-md transition overflow-hidden group block">
                    @if($rel->thumbnail)
                        <img src="{{ asset('storage/' . $rel->thumbnail) }}"
                             alt="{{ $rel->title }}"
                             class="w-full h-36 object-cover group-hover:opacity-90 transition">
                    @else
                        <div class="w-full h-36 bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center">
                            <span class="text-3xl">📰</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <p class="text-xs text-blue-600 font-semibold mb-1">{{ $rel->category->name }}</p>
                        <h3 class="text-sm font-bold text-gray-800 group-hover:text-blue-600 transition leading-snug">
                            {{ $rel->title }}
                        </h3>
                        <p class="text-xs text-gray-400 mt-2">
                            {{ $rel->excerpt ?? Str::limit(strip_tags($rel->content), 80) }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ── Form Komentar ──────────────────────────────────────────────── --}}
    <section class="mt-12 bg-white rounded-2xl shadow p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tinggalkan Komentar</h2>

        <form action="{{ route('comments.store', $article) }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm
                                  @error('name') border-red-400 @enderror"
                           placeholder="Nama Anda">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm
                                  @error('email') border-red-400 @enderror"
                           placeholder="email@anda.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Komentar *</label>
                <textarea name="content" rows="4"
                          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm
                                 @error('content') border-red-400 @enderror"
                          placeholder="Tulis komentar Anda di sini...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-xs text-gray-400">* Komentar akan tampil setelah disetujui admin.</p>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition">
                Kirim Komentar
            </button>
        </form>

    </section>

    {{-- ── Daftar Komentar ────────────────────────────────────────────── --}}
    <section class="mt-8 bg-white rounded-2xl shadow p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Komentar
            <span class="text-base font-normal text-gray-400">({{ $article->comments->count() }})</span>
        </h2>

        @forelse($article->comments as $comment)
            <div class="border-b last:border-0 py-5">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                        </div>
                        <div>
                            <strong class="text-gray-800 text-sm">{{ $comment->name }}</strong>
                            <p class="text-xs text-gray-400">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed pl-12">{{ $comment->content }}</p>
            </div>
        @empty
            <div class="text-center py-8 text-gray-400">
                <p class="text-3xl mb-2">💬</p>
                <p>Belum ada komentar. Jadilah yang pertama!</p>
            </div>
        @endforelse

    </section>

</div>

{{-- ── Footer ──────────────────────────────────────────────────────────── --}}
<footer class="bg-white border-t mt-10 py-6 text-center text-sm text-gray-400">
    &copy; {{ date('Y') }} <strong class="text-gray-600">MBG</strong> — Mau Berita banG
</footer>

</body>
</html>
