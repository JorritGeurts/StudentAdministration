<nav class="container mx-auto p-4 flex justify-between items-center">
    <div class="flex items-center space-x-2">
        <x-nav-link href="{{ route('homepage') }}" :active="request()->routeIs('homepage')">
            Home
        </x-nav-link>

        <x-nav-link href="{{ route('course-overview') }}" :active="request()->routeIs('course-overview')">
            courses
        </x-nav-link>
    </div>

    {{-- right navigation --}}
    <div class="relative flex items-center space-x-2">
        @guest
            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                Login
            </x-nav-link>
            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                Register
            </x-nav-link>
        @endguest
        {{-- dropdown navigation--}}
        @auth
            <x-dropdown align="right" width="48">
                {{-- avatar --}}
                <x-slot name="trigger">
                    <img class="rounded-full h-8 w-8 cursor-pointer"
                         src="https://ui-avatars.com/api/?name={{  urlencode(auth()->user()->name) }}"
                         alt="{{ auth()->user()->name }}">
                </x-slot>
                <x-slot name="content">
                    {{-- all users --}}
                    <div class="block px-4 py-2 text-xs text-gray-400">{{ auth()->user()->name }}</div>
                    <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>
                    <x-dropdown-link href="{{ route('profile.show') }}">Update Profile</x-dropdown-link>
                    <div class="border-t border-gray-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
                    </form>
                    <div class="border-t border-gray-100"></div>
                    {{-- admins only --}}
                </x-slot>
            </x-dropdown>
        @endauth
    </div>
</nav>
