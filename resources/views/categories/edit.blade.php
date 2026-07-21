<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('categories.update', $category) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Nama Kategori
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $category->name) }}"
                            class="w-full border rounded p-2">

                        @error('name')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button
                            type="submit"
                            class="bg-gray-500 text-white px-4 py-2 rounded">
                            Update
                        </button>

                        <a href="{{ route('categories.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>