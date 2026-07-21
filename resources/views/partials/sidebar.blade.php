<div class="w-64 bg-gray-900 text-white min-h-screen">

    <div class="p-6 border-b border-gray-700">

        <h1 class="text-2xl font-bold text-white">
            CMS MBG
        </h1>

        <p class="text-sm text-gray-300">
            Mau Berita banG
        </p>

    </div>

    <nav class="mt-5">

        <a href="{{ route('dashboard') }}"
            class="block px-6 py-3 hover:bg-gray-700 transition">

            🏠 Dashboard

        </a>

        <a href="{{ route('categories.index') }}"
            class="block px-6 py-3 hover:bg-gray-700 transition">

            📂 Kategori

        </a>

        <a href="#"
            class="block px-6 py-3 hover:bg-gray-700 transition">

            📰 Artikel

        </a>

    </nav>

</div>