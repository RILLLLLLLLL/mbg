<nav class="bg-white shadow">

    <div class="flex justify-between items-center px-8 py-4">

        <h2 class="text-2xl font-bold text-gray-700">
            Admin Panel
        </h2>

        <div class="flex items-center gap-4">

            <span class="font-semibold text-gray-700">
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="text-red-600 hover:text-red-800">
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>