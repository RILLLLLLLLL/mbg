@extends('layouts.admin')

@section('content')

<div class="max-w-xl">

    <h2 class="text-2xl font-bold mb-6">Tambah Penulis</h2>

    <div class="bg-white rounded-lg shadow p-6">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500
                              @error('name') border-red-500 @enderror"
                       placeholder="Nama penulis">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500
                              @error('email') border-red-500 @enderror"
                       placeholder="email@mbg.com">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password"
                       name="password"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500
                              @error('password') border-red-500 @enderror"
                       placeholder="Minimal 8 karakter">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Password
                </label>
                <input type="password"
                       name="password_confirmation"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Ulangi password">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium">
                    Simpan
                </button>
                <a href="{{ route('users.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded font-medium">
                    Kembali
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
