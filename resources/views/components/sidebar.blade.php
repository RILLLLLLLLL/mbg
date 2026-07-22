<aside class="w-64 bg-slate-900 text-white min-h-screen">

    <div class="p-6 border-b border-slate-700">

        <h1 class="text-3xl font-bold">
            CMS MBG
        </h1>

        <p class="text-sm text-slate-300">
            Mau Berita banG
        </p>

    </div>

    <nav class="mt-6">

        <a
            href="{{ route('dashboard') }}"
            class="block px-6 py-3 transition
            {{ request()->routeIs('dashboard') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">
            Dashboard
        </a>

        <a
            href="{{ route('categories.index') }}"
            class="block px-6 py-3 transition
            {{ request()->routeIs('categories.*') ? 'bg-blue-600' : 'hover:bg-slate-800' }}">
            Kategori
        </a>

        <a href="{{ route('articles.index') }}"
           class="{{ request()->routeIs('articles.*')
                 ? 'bg-blue-600 text-white'
                 : 'text-gray-700 hover:bg-gray-100' }}">

            Artikel

        </a>

        <a href="#"
           class="block px-6 py-3 hover:bg-slate-800 transition">

            Komentar

        </a>

    </nav>

</aside>