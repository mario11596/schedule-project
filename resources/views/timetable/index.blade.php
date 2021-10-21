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
        <table class="items-center bg-transparent w-full table table-bordered ">
            <thead>
                <th width="125">Vrijeme</th>
                @foreach($weekDays as $day)
                    <th>{{ $day }}</th>
                @endforeach
            </thead>
            <tbody class="item-center">
                @foreach($timeRange as $time)
                    <tr >
                        <td >
                            {{ $time['start'] }} - {{ $time['end'] }}
                        </td>
                        @foreach($weekDays as $index => $day)
                           
                            <td>
                            @livewire('time-subject', ['day' => $day, 'hours' => $time['start']])  
                            </td>
                           
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
    @livewireScripts
</x-app-layout>