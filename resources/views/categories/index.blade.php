@extends('layouts.admin')

@section('content')

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>   

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">

                    <h3 class="text-lg font-bold">
                        Data Kategori
                    </h3>

                    <a href="{{ route('categories.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        + Tambah
                    </a>

                </div>

                <table class="w-full border">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Slug</th>
                            <th class="border p-2">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                            <tr>

                                <td class="border p-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border p-2">
                                    {{ $category->name }}
                                </td>

                                <td class="border p-2">
                                    {{ $category->slug }}
                                </td>

                                <td class="border p-2">

                                    <a href="{{ route('categories.edit',$category->id) }}"
                                        class="text-blue-600">
                                        Edit
                                    </a>

                                    |

                                    <form
                                        action="{{ route('categories.destroy',$category->id) }}"
                                        method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin ingin menghapus?')"
                                            class="text-red-600">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center border p-4">

                                    Belum ada data

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>

            </div>

        </div>
    </div>

@endsection