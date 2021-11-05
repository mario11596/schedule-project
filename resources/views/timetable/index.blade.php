@livewireStyles
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Raspored kolegija') }}
        </h2>
    </x-slot>

    
    <div class="py-10 row d-flex">

        <div class="col-sm-2 col-md-2 col-lg-2">
            
            <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600">
                <label class="font-semibold text-gray-800 dark:text-white">Broj sati kolegija</label>
                    @foreach($subjectAll as $subject)
                        <ol>
                            <li>
                                {{ $subject->name }} 
                                <b>{{ $subject->current_hours}}</b>                   
                            </li>                      
                        </ol>
                    @endforeach
             </div>
        </div>

        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-sm-10 col-md-10 col-lg-10 mr-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
            @livewire('time-subject', ['timeRange' => $timeRange, 'weekDays' => $weekDays])                  
        </div>
        </div>
    </div>
    @livewireScripts
</x-app-layout>