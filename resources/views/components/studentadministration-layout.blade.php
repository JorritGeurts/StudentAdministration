<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to the Vinyl Shop">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="flex flex-col space-y-4 min-h-screen text-gray-800 bg-gray-100">
    <header class="shadow bg-white/70 sticky inset-0 backdrop-blur-sm z-10">
        {{--  Navigation  --}}
        <x-layout.nav />
    </header>
    <main class="container mx-auto p-4 flex-1 px-4">
        <h1 class="text-3xl mb-4">{{$title ?? 'test'}}</h1>
        {{$description ?? 'test'}}

    </main>

    <x-layout.footer />

</div>
@stack('script')
@livewireScripts
</body>
</html>
