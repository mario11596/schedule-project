@livewireStyles
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Raspored kolegija') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
            @livewire('time-subject', ['lecturePeriods' => $lecturePeriods, 'timeRange' => $timeRange, 'weekDays' => $weekDays])                  
        </div>
        </div>
    </div>
    @livewireScripts
</x-app-layout>