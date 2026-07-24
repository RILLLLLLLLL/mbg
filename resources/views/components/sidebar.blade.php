<aside class="w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white min-h-screen flex flex-col shadow-2xl">

    {{-- Logo & Branding --}}
    <div class="p-6 border-b border-slate-700/50">
        <div class="flex items-center gap-3 mb-2">
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-3 rounded-xl shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold tracking-tight">MBG CMS</h1>
                <p class="text-xs text-slate-400 font-medium">Mau Berita banG</p>
            </div>
        </div>
    </div>

    {{-- User Info --}}
    <div class="px-6 py-4 bg-slate-800/50 border-b border-slate-700/50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold text-sm shadow-lg">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-sm truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-400">
                    @hasrole('Admin')
                        <span class="bg-amber-500/20 text-amber-300 px-2 py-0.5 rounded-full text-[10px] font-semibold">ADMIN</span>
                    @else
                        <span class="bg-blue-500/20 text-blue-300 px-2 py-0.5 rounded-full text-[10px] font-semibold">PENULIS</span>
                    @endhasrole
                </p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group
                  {{ request()->routeIs('dashboard') 
                     ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/50' 
                     : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 rounded-lg transition-transform group-hover:scale-110
                        {{ request()->routeIs('dashboard') ? 'bg-white/20' : 'bg-slate-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <span>Dashboard</span>
            @if(request()->routeIs('dashboard'))
                <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white animate-pulse"></div>
            @endif
        </a>

        @hasrole('Admin')
        <a href="{{ route('categories.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group
                  {{ request()->routeIs('categories.*') 
                     ? 'bg-gradient-to-r from-green-600 to-emerald-600 text-white shadow-lg shadow-green-500/50' 
                     : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 rounded-lg transition-transform group-hover:scale-110
                        {{ request()->routeIs('categories.*') ? 'bg-white/20' : 'bg-slate-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
            <span>Kategori</span>
        </a>
        @endhasrole

        <a href="{{ route('articles.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group
                  {{ request()->routeIs('articles.*') 
                     ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg shadow-purple-500/50' 
                     : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 rounded-lg transition-transform group-hover:scale-110
                        {{ request()->routeIs('articles.*') ? 'bg-white/20' : 'bg-slate-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <span>Artikel</span>
        </a>

        @hasrole('Admin')
        <a href="{{ route('comments.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group
                  {{ request()->routeIs('comments.*') 
                     ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-lg shadow-orange-500/50' 
                     : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 rounded-lg transition-transform group-hover:scale-110
                        {{ request()->routeIs('comments.*') ? 'bg-white/20' : 'bg-slate-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
            <span>Komentar</span>
        </a>

        <a href="{{ route('users.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group
                  {{ request()->routeIs('users.*') 
                     ? 'bg-gradient-to-r from-cyan-600 to-blue-600 text-white shadow-lg shadow-cyan-500/50' 
                     : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 rounded-lg transition-transform group-hover:scale-110
                        {{ request()->routeIs('users.*') ? 'bg-white/20' : 'bg-slate-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <span>Manajemen Penulis</span>
        </a>
        @endhasrole

    </nav>

    {{-- Footer Actions --}}
    <div class="p-4 border-t border-slate-700/50 space-y-2">
        <a href="{{ route('home') }}" target="_blank"
           class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-sm font-medium transition-all duration-200 group">
            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Lihat Website</span>
        </a>
    </div>

</aside>
