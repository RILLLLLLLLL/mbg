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

        </div>

    </div>

</div>

</body>

</html>