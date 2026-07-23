@extends('layouts.admin')

@section('content')

<h2 class="text-3xl font-bold mb-6">
    Dashboard
</h2>

<p class="mb-6 text-gray-600">
    Selamat datang,
    <strong>{{ Auth::user()->name }}</strong>
</p>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    {{-- Total Artikel --}}
    <div class="bg-blue-500 text-white rounded-xl p-6 shadow">

        <p class="text-lg">
            📄 Total Artikel
        </p>

        <h2 class="text-4xl font-bold mt-4">
            {{ $totalArticles }}
        </h2>

    </div>

    {{-- Total Kategori --}}
    <div class="bg-green-500 text-white rounded-xl p-6 shadow">

        <p class="text-lg">
            📂 Total Kategori
        </p>

        <h2 class="text-4xl font-bold mt-4">
            {{ $totalCategories }}
        </h2>

    </div>

    {{-- Penulis --}}
    <div class="bg-yellow-500 text-white rounded-xl p-6 shadow">

        <p class="text-lg">
            ✍️ Total Penulis
        </p>

        <h2 class="text-4xl font-bold mt-4">
            {{ $totalPenulis }}
        </h2>

    </div>

    {{-- Published --}}
    <div class="bg-purple-500 text-white rounded-xl p-6 shadow">

        <p class="text-lg">
            🌍 Published
        </p>

        <h2 class="text-4xl font-bold mt-4">
            {{ $published }}
        </h2>

    </div>

    {{-- Draft --}}
    <div class="bg-red-500 text-white rounded-xl p-6 shadow">

        <p class="text-lg">
            📝 Draft
        </p>

        <h2 class="text-4xl font-bold mt-4">
            {{ $draft }}
        </h2>

    </div>

</div>

<div class="bg-white rounded-lg shadow mt-8">

    <div class="border-b p-5">

        <h3 class="text-lg font-semibold">
            Artikel Terbaru
        </h3>

    </div>

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">
                    Judul
                </th>

                <th class="p-3 text-left">
                    Status
                </th>

                <th class="p-3 text-left">
                    Dibuat
                </th>

            </tr>

        </thead>

        <tbody>

<tbody>

@foreach($latestArticles as $article)

<tr>

    <td class="p-3">
        {{ $article->title }}
    </td>

    <td class="p-3">

        @if($article->status == 'published')

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                Published
            </span>

        @else

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                Draft
            </span>

        @endif

    </td>

    <td class="p-3">
        {{ $article->created_at->format('d M Y') }}
    </td>

</tr>

@endforeach

</tbody>

        <!-- @forelse($latestArticles as $article)

            <tr class="border-t">

                <td class="p-3">
                    {{ $article->title }}
                </td>

                <td class="p-3">
                    {{ ucfirst($article->status) }}
                </td>

                <td class="p-3">
                    {{ $article->created_at->format('d M Y') }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center p-5">

                    Belum ada artikel.

                </td>

            </tr>

        @endforelse -->

        </tbody>

    </table>

</div>

@endsection