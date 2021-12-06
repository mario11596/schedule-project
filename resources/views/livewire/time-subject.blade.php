<div class="py-10 d-flex">
    <div class="col-sm-2 col-md-2 col-lg-2">
                
        <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600">
            <ol><label class="font-semibold text-gray-800 dark:text-white">Preostali sati:</label></ol>
                @foreach($subjectPPs as $subject)
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
            @if(session()->has('message'))
                <div class="alert alert-success"> {{ session('message')}} </div>
            @endif

            <div class="row mb-3 p-2 ">
                <div class="col-md-3">
                    <label>Smjer</label>
                    <select wire:model="byCourse" class="form-control">
                        <option value="" selected>Nije odabrano</option>
                        <option value="smjer1">Smjer 1</option>
                        <option value="smjer2">Smjer 2</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Semestar</label>
                    <select wire:model="bySemester" class="form-control">
                        <option value="" selected>Nije odabrano</option>
                        <option value="ljetniSemestar">Ljetni semestar</option>
                        <option value="zimskiSemestar">Zimski semestar</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Tjedan</label>
                    <select wire:model="byWeek" class="form-control">
                        <option value="" selected>Nije odabrano</option>
                        @foreach($byWeeks as $index => $byWeek)
                            <option value="{{ $byWeeks[$index] }}">{{ $byWeek }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-2 py-4">
                    <a class="btn btn-primary"  wire:click="filterSearch()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <table class="items-center bg-transparent w-full table table-bordered ">
                <thead>
                    <th class="text-center" style="background-color:rgb(255, 229, 118);"  width="125">Vrijeme</th>
                    @foreach($weekDays as $day)
                        <th class="text-center" style="background-color:rgb(255, 229, 118);" >{{ $day }}</th>
                    @endforeach
                </thead>
                <tbody class="item-center">
                    @foreach($timeRange as $time)
                        <tr >
                            <td class="text-center">
                                {{ $time['start'] }} - {{ $time['end'] }}
                            </td>
                            @foreach($weekDays as $day)  
                                <td class="col-sm-2 col-md-2 col-lg-2">
                                    <div>
                                            @php($lecturePeriod = $lecturePeriods->where('day', $day)->where('hours', $time['start'])->first())                               
                                        @if($lecturePeriod)                                 
                                            <form>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label type="text" wire:model="$lecturePeriod->subjectPP->name " value="{{ $lecturePeriod->subjectPP->name  }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$lecturePeriod->subjectPP->name}}</label>
                                                </div>
                                        
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label type="text" wire:model="$lecturePeriod->classroom->name " value="{{ $lecturePeriod->classroom->name  }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$lecturePeriod->classroom->name }}</label>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label type="text" wire:model="$lecturePeriod->comment "  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$lecturePeriod->comment}}</label>
                                                </div>
                                                
                                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $lecturePeriod->id }})"> Uredi </button>
                                            </form>
                                            @include('livewire.update')                          
                                        @else
                                            @include('livewire.create', ['day' => $day, 'hours' => $time['start']])                           
                                        @endif                          
                                    </div> 
                                </td>            
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

