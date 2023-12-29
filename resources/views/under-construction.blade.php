<x-studentadministration-layout>
    <x-slot name="description">This page is under construction</x-slot>
    <x-slot name="title">Welcome to the Vinyl Shop</x-slot>
    <x-slot name="subtitle"></x-slot>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="hidden md:flex md:flex-row-reverse md:border-r-2 md:border-gray-300">
            <x-heroicon-s-face-frown class="w-40 h-40 text-gray-300" />
        </div>
        <div>
            <p class="text-5xl">COMING SOON</p>
            <p class="text-2xl font-light text-gray-400">THIS PAGE IS UNDER CONSTRUCTION</p>
            <div class="mt-4">
                <x-button class="bg-gray-400 hover:bg-gray-500">
                    <a href="{{ route('homepage') }}">Home</a>
                </x-button>
                <x-button class="bg-gray-400 hover:bg-gray-500">
                    <a href="#" onclick="window.history.back();">Back</a>
                </x-button>
            </div>
        </div>
    </div>
</x-studentadministration-layout>
