<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <div>
                <h2 class="text-xl font-bold text-emerald-600">
                    KOFFUEL Nexus
                </h2>
            </div>

            {{-- Dashboard --}}
            <div class="hidden sm:block">
                <span class="text-gray-700 font-semibold">
                    Dashboard
                </span>
            </div>

            {{-- Email + Dropdown --}}
            <div class="relative">

                {{-- EMAIL (klik) --}}
                <button @click="open = !open"
                        class="text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                    {{ Auth::user()->email }}
                </button>

                {{-- DROPDOWN --}}
                <div x-show="open"
                     x-transition
                     x-cloak
                     @click.away="open = false"
                     class="absolute right-0 mt-2 w-44 bg-white border border-gray-100 rounded-xl shadow-lg overflow-hidden z-50">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-3 text-sm text-red-500 hover:bg-red-50 transition">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</nav>