@livewireStyles
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Raspored kolegija') }}
        </h2>
    </x-slot>

    
    <div>
        @livewire('time-subject', ['timeRange' => $timeRange, 'weekDays' => $weekDays])                   
    </div>
    @livewireScripts
</x-app-layout>