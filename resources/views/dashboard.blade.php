<x-app-layout>
    <x-slot name="header">     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Raspored sati') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('dashboard') }}" method="get">
                <div class="row mb-3 p-2 ">
                    <div class="col-md-3">
                        <label>Smjer</label>
                        <select name="byCourse" class="form-control">
                            <option value="" selected>Nije odabrano</option>
                            <option value="smjer1" {{( $byCourse == 'smjer1') ? 'selected' : ''}}>Smjer 1</option>
                            <option value="smjer2" {{( $byCourse == 'smjer2') ? 'selected' : ''}}>Smjer 2</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Semestar</label>
                        <select name="bySemester" class="form-control">
                            <option value="" selected>Nije odabrano</option>
                            <option value="ljetniSemestar" {{( $bySemester == 'ljetniSemestar') ? 'selected' : ''}}>Ljetni semestar</option>
                            <option value="zimskiSemestar" {{( $bySemester == 'zimskiSemestar') ? 'selected' : ''}}>Zimski semestar</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Tjedan</label>
                        <select name="byWeek" class="form-control">
                            <option value="" selected>Nije odabrano</option>
                                @foreach($byWeeks as $key => $byWeekk)
                                    <option value="{{ $key+1 }}" {{( $key+1 == $byWeek ) ? 'selected' : ''}}>{{ $byWeekk }}</option>
                                @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-2 py-4">
                        <button class="btn btn-primary" type="submit"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                        &nbsp;
                        <button type="submit" class="btn btn-success btn-sm" name="exportPDF">PDF format</button> 
                    </div>
                </div>
            </form>
            @if(isset($byWeek_start))
                <div class="bg-white rounded-pill px-2">
                    <h5 class="font-semibold"> &nbsp;Rapored vrijedi za tjedan od: {{ $byWeek_start }} - {{ $byWeek_end }}</h5>
                </div>
            @elseif(!isset($byWeek_start) && ($byCourse != '' || $bySemester != ''))
                <div class="rounded-pill px-2 " style="background: red; text-align: center;">
                    <h5 class="font-semibold"> &nbsp;Nije odabran datum početka nastave!</h5>
                </div>
           @endif
           

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="items-center bg-transparent w-full table table-bordered ">
                <thead>
                    <th class="text-center" style="background-color:rgb(255, 229, 118);" width="125">Vrijeme</th>
                    @foreach($weekDays as $day)
                        <th class="text-center" style="background-color:rgb(255, 229, 118);">{{ $day }}</th>
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
                                                <div class="col-span-6 sm:col-span-3 text-center">
                                                   {{$lecturePeriod->subjectPP->name}}
                                                </div>
                                        
                                                <div class="col-span-6 sm:col-span-3 text-center ">
                                                    Predavaonica: {{$lecturePeriod->classroom->name }}
                                                </div>

                                                @if($lecturePeriod->comment)
                                                <div class="col-span-6 sm:col-span-3 text-center">
                                                    Komentar: {{$lecturePeriod->comment}}
                                                </div>
                                                @endif     
                                            </form>
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
</x-app-layout>
