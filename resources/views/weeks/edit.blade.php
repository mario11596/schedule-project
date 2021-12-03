<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uredi tjedan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    <strong class="font-bold">
                                    {{ $error }}
                                    </strong>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('weeks.update', $week->id) }}" method="POST">
                    @csrf

                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Ime tjedna: </label>
                        <input type="text" name="name" id="name" value="{{ $week->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="course" class="block text-sm font-medium text-gray-700">Smjer: </label>
                        <select id="course" name="course" value="{{ $week->course }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">   
                        <option value="smjer1" {{($week->course) ? 'selected' : ''}}>Smjer1</option>
                        <option value="smjer2" {{($week->course) ? 'selected' : ''}}>Smjer2</option> 
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semestar: </label>
                        <select id="semester" name="semester" value="{{ $week->semester }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="ljetniSemestar" {{($week->semester) ? 'selected' : ''}}>Ljetni semestar</option>
                        <option value="zimskiSemestar" {{($week->semester) ? 'selected' : ''}}>Zimski semestar</option>
                        </select>
                    </div>

                    <div class="col-span-6">
                        <label for="start_day" class="block text-sm font-medium text-gray-700">Početak tjedna: </label>
                        <input type="date" name="start_day" id="start_day" value="{{ $week->start_day }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Spremi promjene
                    </button>
                </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>