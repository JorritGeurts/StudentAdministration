<div>
    {{-- show preloader while fetching data in the background --}}
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50"
         wire:loading>
        <x-tmk.preloader class="bg-green-500/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>

    {{-- filter section: artist or title, genre, max price and records per page --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-8 mt-8">
        <div >
            <x-label for="name" value="Filter"/>
            <div
                class="relative">
                <x-input id="name" type="text"
                         wire:model.live.debouce.500ms="name"
                         class="block mt-1 w-full"
                         placeholder="Filter Artist Or Record"/>
                <button
                    @click="$wire.set('name', '')"
                    class="w-5 absolute right-4 top-3">
                    <x-phosphor-x/>
                </button>
            </div>
        </div>
        <div >
            <x-label for="programme" value="Programme"/>
            <x-tmk.form.select id="programme"
                               wire:model.live="programme"
                               class="block mt-1 w-full">
                <option value="%">Programmes</option>
                @foreach($allprogrammes as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->name }}
                    </option>
                @endforeach
            </x-tmk.form.select>
        </div>
        <div >
            <x-label for="perPage" value="Courses per page"/>
            <x-tmk.form.select id="perPage"
                               wire:model.live="perPage"
                               class="block mt-1 w-full">
                @foreach ([3,6,9,12,15,18,24] as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </x-tmk.form.select>
        </div>
    </div>
    {{-- master section: cards with paginationlinks --}}
    <div class="my-4">{{ $courses->links() }}</div>
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-8 mt-8">
        @foreach($courses as $record)
        <div class="flex bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <div
                wire:key="record-{{$record-> id}}"
                class="flex-1 flex flex-col">

                <div class="flex-1 p-4">
                    <p class="text-center font-sm text-sm border-b border-gray-300 h-10">{{$record->programme_name}}</p>
                    <p class="text-lg font-medium">{{$record -> name}}</p>
                    <p class="italic pb-2">{{$record -> description}}</p>
                </div>
                <div class="flex justify-center border-t border-gray-300 bg-gray-100 px-4 py-2">
                    <div class="flex space-x-4">
                        <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <p wire:click="showCourses({{ $record->id }})">Manage students</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="my-4">{{ $courses->links() }}</div>

    {{-- No records found --}}
    @if($courses->isEmpty())
        <x-tmk.alert type="danger" class="w-full">
            Can't find any course with <b>'{{ $name }}'</b> in <b>'{{$programme->name ??''}}</b>
        </x-tmk.alert>
    @endif

    {{-- Detail section --}}
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title"><div class="flex items-center border-b border-gray-300 pb-2 gap-4">
                <h3 class="font-medium">
                    {{ $selectedRecord->name ?? '' }}<br/>
                    <span class="font-light">{{ $selectedRecord->description ?? '' }}</span>
                </h3>
            </div>
        </x-slot>
        <x-slot name="content">
           {{-- @isset($selectedRecord['student_name'])
                <table class="w-full text-left align-top">
                    <thead>
                    </thead>
                    <tbody>
                    @foreach($selectedRecord['student_name'] as $student)
                        <tr>
                            <td>{{ $student->student->first_name}} {{  $student->student->last_name }}
                                (semester {{ $student->semester }})
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endisset--}}
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>

