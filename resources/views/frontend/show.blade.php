<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>{{ $article->title }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto py-10">

    <a
        href="{{ route('home') }}"
        class="text-blue-600">

        ← Kembali

    </a>

    <div class="bg-white rounded-xl shadow mt-5 overflow-hidden">

        @if($article->thumbnail)

            <img
                src="{{ asset('storage/'.$article->thumbnail) }}"
                class="w-full h-96 object-cover">

        @endif

        <div class="p-8">

        @if(session('success'))
            <div class="mb-4 rounded bg-green-100 border border-green-300 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

            <span
                class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                {{ $article->category->name }}

            </span>

            <h1 class="text-4xl font-bold mt-5">

                {{ $article->title }}

            </h1>

            <div class="mt-4 text-gray-500 flex gap-5">

                <span>

                    ✍️ {{ $article->user->name }}

                </span>

                <span>

                    📅 {{ $article->created_at->format('d M Y') }}

                </span>

            </div>

            <hr class="my-8">

            <div class="prose max-w-none">

                {!! nl2br(e($article->content)) !!}

            </div>

         <hr class="my-8">

            <h2 class="text-2xl font-bold mb-4">
                Tinggalkan Komentar
            </h2>

            <form
                action="{{ route('comments.store', $article) }}"
                method="POST"
                class="space-y-4"
            >

                @csrf

                <div>
                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        class="w-full border rounded p-2"
                        value="{{ old('name') }}"
                    >

                    @error('name')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div>
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="w-full border rounded p-2"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div>
                    <label>Komentar</label>

                    <textarea
                        name="content"
                        rows="5"
                        class="w-full border rounded p-2"
                    >{{ old('content') }}</textarea>

                    @error('content')
                        <small class="text-red-500">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                

                <button
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
                >
                    Kirim Komentar
                </button>

            </form>

            <hr class="my-8">

<h2 class="text-2xl font-bold mb-6">
    Komentar
</h2>

@forelse($article->comments as $comment)

<div class="border rounded-lg p-4 mb-4 bg-gray-50">

    <div class="flex justify-between">

        <strong>{{ $comment->name }}</strong>

        <small class="text-gray-500">
            {{ $comment->created_at->format('d M Y') }}
        </small>

    </div>

    <p class="mt-3">

        {{ $comment->content }}

    </p>

</div>

@empty

<p class="text-gray-500">

Belum ada komentar.

</p>

@endforelse

        </div>

    </div>

</div>

</body>

</html>