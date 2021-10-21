<div>
    <form wire:submit.prevent="submit" method="POST">
    <div class="col-span-6 sm:col-span-3">
        <select wire:model="timetable.subjectPPs" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" selected>Kolegij: </option>
            @foreach($subjectPPs as $subjectPP)
                <option value="{{ $subjectPP->id }}">{{ $subjectPP->name }}</option>
            @endforeach
        </select>

    </div>

    <div class="col-span-6 sm:col-span-3">
        <select wire:model="timetable.classrooms" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" selected>Predavaonica: </option>
            @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <input type="text" wire:model="timetable.comments" id="comment" placeholder="Komentar:" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <button type="submit">
        save
    </button>
    </form>
</div>
