@extends('layouts.admin')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h2 class="text-3xl font-extrabold text-gray-800 flex items-center gap-3">
        <span class="text-4xl">👋</span>
        <span>Selamat Datang, <span class="text-blue-600">{{ Auth::user()->name }}</span></span>
    </h2>
    <p class="text-gray-500 mt-2">Berikut ringkasan aktivitas CMS Anda hari ini</p>
</div>

{{-- Stats Grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-8">

    {{-- Total Artikel --}}
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <span class="text-sm font-medium opacity-80">Total</span>
        </div>
        <h3 class="text-4xl font-extrabold mb-1">{{ $totalArticles }}</h3>
        <p class="text-blue-100 text-sm font-medium">Artikel</p>
    </div>

    {{-- Total Kategori --}}
    <div class="bg-gradient-to-br from-emerald-500 to-green-600 text-white rounded-2xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
            <span class="text-sm font-medium opacity-80">Total</span>
        </div>
        <h3 class="text-4xl font-extrabold mb-1">{{ $totalCategories }}</h3>
        <p class="text-green-100 text-sm font-medium">Kategori</p>
    </div>

    {{-- Total Penulis --}}
    <div class="bg-gradient-to-br from-amber-500 to-orange-600 text-white rounded-2xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <span class="text-sm font-medium opacity-80">Total</span>
        </div>
        <h3 class="text-4xl font-extrabold mb-1">{{ $totalPenulis }}</h3>
        <p class="text-orange-100 text-sm font-medium">Penulis</p>
    </div>

    {{-- Published --}}
    <div class="bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-2xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-sm font-medium opacity-80">Live</span>
        </div>
        <h3 class="text-4xl font-extrabold mb-1">{{ $published }}</h3>
        <p class="text-purple-100 text-sm font-medium">Published</p>
    </div>

    {{-- Draft --}}
    <div class="bg-gradient-to-br from-rose-500 to-pink-600 text-white rounded-2xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <span class="text-sm font-medium opacity-80">Draft</span>
        </div>
        <h3 class="text-4xl font-extrabold mb-1">{{ $draft }}</h3>
        <p class="text-pink-100 text-sm font-medium">Artikel Draft</p>
    </div>

</div>

{{-- Two Column Layout --}}
<div class="grid lg:grid-cols-2 gap-6 mb-6">

    {{-- Latest Articles --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-5 border-b border-gray-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-blue-500 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Artikel Terbaru</h3>
            </div>
            <a href="{{ route('articles.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                Lihat Semua →
            </a>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse($latestArticles as $article)
                <div class="px-6 py-4 hover:bg-gray-50 transition">
                    <div class="flex items-start gap-4">
                        <div class="flex-1 min-w-0">
                            <h4 class="font-semibold text-gray-800 truncate mb-1">{{ $article->title }}</h4>
                            <div class="flex items-center gap-3 text-xs text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $article->created_at->format('d M Y') }}
                                </span>
                                <span>•</span>
                                <span>{{ $article->user->name }}</span>
                            </div>
                        </div>
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap
                            {{ $article->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($article->status) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="p-10 text-center text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p>Belum ada artikel</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Artikel per Kategori --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-5 border-b border-gray-200 flex items-center gap-3">
            <div class="bg-green-500 p-2 rounded-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-800">Artikel per Kategori</h3>
        </div>

        <div class="p-6 space-y-4">
            @forelse($artikelPerKategori as $item)
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-medium text-gray-700">{{ $item->name }}</span>
                        <span class="text-sm font-semibold text-gray-800">{{ $item->total }} artikel</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-2.5 rounded-full transition-all duration-500"
                             style="width: {{ min($item->total * 15, 100) }}%"></div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-400">
                    <p>Belum ada data</p>
                </div>
            @endforelse
        </div>
    </div>

</div>

{{-- Artikel per Penulis --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-5 border-b border-gray-200 flex items-center gap-3">
        <div class="bg-purple-500 p-2 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>
        <h3 class="text-lg font-bold text-gray-800">Statistik Penulis</h3>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Penulis</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Published</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Draft</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
            @forelse($artikelPerPenulis as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($item->name, 0, 1)) }}
                            </div>
                            <span class="font-medium text-gray-800">{{ $item->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-lg font-bold text-gray-800">{{ $item->total }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                            {{ $item->published }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                            {{ $item->draft }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                        Belum ada data penulis
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
