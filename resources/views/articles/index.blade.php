@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Data Artikel
</h2>

<form method="GET"
      action="{{ route('articles.index') }}"
      class="flex gap-3 mb-5">

    <input
        type="text"
        name="search"
        placeholder="Cari judul..."
        value="{{ request('search') }}"
        class="border rounded px-3 py-2 w-64">

    <select
        name="category"
        class="border rounded px-3 py-2">

        <option value="">Semua Kategori</option>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(request('category') == $category->id)>

                {{ $category->name }}

            </option>

        @endforeach

    </select>

    <select
        name="status"
        class="border rounded px-3 py-2">

        <option value="">Semua Status</option>

        <option value="draft"
            @selected(request('status') == 'draft')>

            Draft

        </option>

        <option value="published"
            @selected(request('status') == 'published')>

            Published

        </option>

    </select>

    <button
        class="bg-blue-600 text-white px-4 rounded">

        Cari

    </button>

</form>

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-lg shadow">

    <div class="flex justify-between items-center p-5 border-b">

        <h3 class="font-semibold text-lg">
            Daftar Artikel
        </h3>

        <a href="{{ route('articles.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

            + Tambah Artikel

        </a>

    </div>

    
    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="p-3">No</th>

                <th class="p-3">Thumbnail</th>

                <th class="p-3">Judul</th>

                <th class="p-3">Kategori</th>

                <th class="p-3">Penulis</th>

                <th class="p-3">Status</th>

                <th class="p-3">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @forelse($articles as $article)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-3">

                        @if($article->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $article->thumbnail) }}"
                                    alt="{{ $article->title }}"
                                    class="w-20 h-14 object-cover rounded">

                            @else
    
                                <span class="text-gray-400">
                                    -
                                </span>

                            @endif

                    </td>

                    <td class="p-3">

                        {{ $article->title }}

                    </td>

                    <td class="p-3">

                        {{ $article->category->name }}

                    </td>

                    <td class="p-3">

                        {{ $article->user->name }}

                    </td>

                    <td class="p-3">

                        {{ ucfirst($article->status) }}

                    </td>

                    <td class="p-3">

    <a href="{{ route('articles.edit', $article) }}"
       class="text-blue-600 hover:underline">
        Edit
    </a>

    |

    <form action="{{ route('articles.destroy', $article) }}"
          method="POST"
          class="inline">

        @csrf
        @method('DELETE')

        <button
            onclick="return confirm('Yakin ingin menghapus artikel ini?')"
            class="text-red-600 hover:underline">

            Hapus

        </button>

    </form>

</td>

                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        class="text-center p-6 text-gray-500">

                        Belum ada artikel.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-5">
            {{ $articles->links() }}
        </div>

    </div>

</div>

@endsection 