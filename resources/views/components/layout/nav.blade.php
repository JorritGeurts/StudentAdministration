<nav class="container mx-auto p-4 flex justify-between items-center">
    <div class="flex items-center space-x-2">
        <x-nav-link href="{{ route('homepage') }}" :active="request()->routeIs('homepage')">
            Home
        </x-nav-link>

        <x-nav-link href="{{ route('courses-overview') }}" :active="request()->routeIs('courses-overview')">
            courses
        </x-nav-link>
    </div>
</nav>
