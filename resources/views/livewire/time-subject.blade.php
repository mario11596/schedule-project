<div>
    @if(session()->has('message'))
        <div class="alert alert-success"> {{ session('message')}} </div>
    @endif
    <table class="items-center bg-transparent w-full table table-bordered ">
        <thead>
            <th class="text-center" width="125">Vrijeme</th>
            @foreach($weekDays as $day)
                <th class="text-center">{{ $day }}</th>
            @endforeach
        </thead>
        <tbody class="item-center">
            @foreach($timeRange as $time)
                <tr >
                    <td class="text-center">
                        {{ $time['start'] }} - {{ $time['end'] }}
                    </td>
                    @foreach($weekDays as $day)  
                        <td>
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