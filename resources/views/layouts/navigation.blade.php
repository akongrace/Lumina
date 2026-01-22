<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-9 w-auto text-gray-800" />
                </a>
            </div>

            <!-- Desktop -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-600">
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" class="sm:hidden">
        <x-responsive-nav-link :href="route('dashboard')">
            Dashboard
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('profile.edit')">
            Profile
        </x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </x-responsive-nav-link>
        </form>
    </div>
</nav>
