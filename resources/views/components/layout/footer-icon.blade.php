@props([
    'icon' => 'heroicon-s-question-mark-circle',
])

<a {{ $attributes->merge([
        'href' => '#!',
        'target' => '_self',
        'class' => "text-cyan-600 hover:text-gray-500 hover:scale-150 transition duration-150"
    ]) }}>
    <x-icon class="w-4 h-4" name="{{ $icon }}"/>
</a>
