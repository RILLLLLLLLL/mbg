<header class="bg-white shadow h-16 flex items-center justify-between px-8">

    <h2 class="text-xl font-semibold">
        Admin Panel
    </h2>

    <div class="flex items-center gap-4">

        <span>
            {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="text-red-600">
                Logout
            </button>

        </form>

    </div>

</header>