@php
    /* config --------------------- */
    $onlyDebugMode = true;          // only show this component in debug mode
    $sidebar = true;                // shows the result in a sidebar on the page
    $console = true;                // show the result in the developer console
    $consoleJson = true;            // show the result in the console in json format (true) or as an object (false)
    /* end config ----------------- */

    // only show this component in debug mode
    if(!config('app.debug') && $onlyDebugMode) return;

    $output = [];
    $prefixes = ['__', 'app', 'errors', 'attributes', 'slot', 'output', 'prefixes', 'show', 'onlyDebugMode', 'sidebar', 'console', 'consoleJson'];
    $vars = get_defined_vars();

    foreach($vars as $key => $value) {
        if (!array_reduce($prefixes, function($carry, $item) use ($key) {
            return $carry || str_starts_with($key, $item);
        }, false)) {
            if ($key === '_instance') {
                json_encode($value) !== '{}' && json_encode($value) !== '[]' ? $output['public properties'] = $value : '';
            } else {
                $output[$key] = $value;
            }
        }
     }
@endphp

<div>
    {{-- sidebar --}}
    @if($sidebar)
        <div x-date class="
            absolute p-4 top-0 left-0 z-50 bg-slate-500/50 text-white backdrop-blur-sm shadow-2xl border border-slate-500
            transition -translate-x-full
            hover:translate-x-0 duration-300 ease-in-out">
            <x-si-livewire
                class="w-6 h-6 absolute top-4 -right-8 text-pink-400 drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.6)]"/>
            <div class="overflow-auto">
                <h1 class="font-bold mb-2">Livewire properties</h1>
                @foreach(array_reverse($output) as $key => $value)
                    <div x-data="{show: false}" x-cloak>
                        <hr class="my-2 border-slate-500">
                        <button @click="show = !show" class="w-full flex items-center cursor-pointer gap-2">
                            <span class="text-xl transition-all block"
                                  :class="show ? 'rotate-45' : ''">+</span>
                            <p class="text-sm italic cursor-pointer">{{ $key }}</p>
                        </button>
                        <pre class="text-sm" x-show="show"
                             x-transition>{{ json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) }}</pre>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- devtools console --}}
    @if($console)
        @foreach(array_reverse($output) as $key => $value)
            @if($consoleJson)
                <script>
                    console.log('%c {!! $key !!}: ', 'background: #222; color: #fff');
                    console.log(JSON.stringify({!! json_encode($value) !!}, null, 2));
                </script>
            @else
                <script>
                    console.log('%c {!! $key !!}: ', 'background: #222; color: #fff');
                    console.log({!! json_encode($value) !!});
                </script>
            @endif
        @endforeach
    @endif
</div>
