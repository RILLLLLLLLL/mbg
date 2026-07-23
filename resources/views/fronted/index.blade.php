<!DOCTYPE html>
<html>

<head>

    <title>CMS MBG</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-4xl font-bold mb-8">

        Mau Berita banG

    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($articles as $article)

            <div class="bg-white rounded-xl shadow overflow-hidden">

                @if($article->thumbnail)

                    <img
                        src="{{ asset('storage/'.$article->thumbnail) }}"
                        class="w-full h-56 object-cover">

                @endif

                <div class="p-5">

                    <span
                        class="text-sm text-blue-600">

                        {{ $article->category->name }}

                    </span>

                    <h2 class="text-xl font-bold mt-2">

                        {{ $article->title }}

                    </h2>

                    <p class="text-gray-500 mt-3">

                        {{ Str::limit($article->content,100) }}

                    </p>

                    <a
                        href="{{ route('artikel.show',$article) }}"
                        class="text-blue-600 mt-4 inline-block">

                        Baca Selengkapnya →

                    </a>

                </div>

            </div>

        @endforeach

    </div>

    <div class="mt-8">

        {{ $articles->links() }}

    </div>

</div>

</body>

</html>