@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">Manajemen Penulis</h2>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<div class="bg-white rounded-lg shadow">

    <div class="flex justify-between items-center p-5 border-b">
        <h3 class="font-semibold text-lg">Daftar Penulis</h3>
        <a href="{{ route('users.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Penulis
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-center">Jumlah Artikel</th>
                    <th class="p-3 text-left">Bergabung</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse($users as $user)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3 font-medium">{{ $user->name }}</td>
                    <td class="p-3 text-gray-600">{{ $user->email }}</td>
                    <td class="p-3 text-center">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $user->articles_count }}
                        </span>
                    </td>
                    <td class="p-3 text-gray-500 text-sm">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="p-3 text-center">
                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus akun {{ $user->name }}? Semua artikel miliknya juga akan ikut terhapus.')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">
                        Belum ada penulis terdaftar.
                    </td>
                </tr>
            @endforelse
            </tbody>

        </table>
    </div>

    <div class="p-4">
        {{ $users->links() }}
    </div>

</div>

@endsection
