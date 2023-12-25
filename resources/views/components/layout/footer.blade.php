<footer class="container mx-auto p-4 text-sm border-t flex justify-between items-center">
    Thomas More - © {{ date('Y') }}

    <div class="p-2 bg-gray-200 rounded-md"
         x-data="{showIcons: false}"
         @click="showIcons = true">
        <div class="text-gray-400 text-xs text-center cursor-pointer ">
            <span class="sm:hidden">&lt; 640</span>
            <span class="hidden sm:block md:hidden">SM | 640 - 768</span>
            <span class="hidden md:block lg:hidden">MD | 768 - 1024</span>
            <span class="hidden lg:block xl:hidden">LG | 1024 - 1280</span>
            <span class="hidden xl:block 2xl:hidden">XL | 1280 - 1536</span>
            <span class="hidden 2xl:block">2XL |  &gt; 1536</span>
        </div>
        <div class="fixed left-0 right-0 bottom-12 p-2 mx-2 sm:mx-8
                rounded-md border shadow-lg bg-amber-200/25 backdrop-blur-sm
                flex justify-center space-x-4"
             x-show="showIcons"
             x-cloak
             x-transition.duration.300ms
             @click.outside="showIcons = false">

            <x-layout.footer-icon target="_myadmin"
                                  href="http://phpmyadmin.test"
                                  icon="si-phpmyadmin"/>
            <x-layout.footer-icon target="_mail"
                                  href="http://localhost:8025"
                                  icon="si-maildotru"/>
            <x-layout.footer-icon target="_icons"
                                  href="https://blade-ui-kit.com/blade-icons"
                                  icon="fas-icons"/>
            <x-layout.footer-icon target="_tall"
                                  href="https://tailwindcss.com/docs"
                                  icon="si-tailwindcss"/>
            <x-layout.footer-icon target="_tall"
                                  href="https://alpinejs.dev/"
                                  icon="si-alpinedotjs"/>
            <x-layout.footer-icon target="_tall"
                                  href="https://laravel.com/docs/10.x/"
                                  icon="si-laravel"/>
            <x-layout.footer-icon target="_tall"
                                  href="https://laravel-livewire.com/docs/2.x/"
                                  icon="si-livewire"/>
        </div>
    </div>
    <div>Build with Laravel {{ app()->version() }}</div>
</footer>
