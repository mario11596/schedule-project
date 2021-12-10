<?php

use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\SubjectPPsController;
use App\Http\Controllers\TimetablesController;
use App\Http\Controllers\WeeksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['auth:sanctum', 'verified'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/subject', [SubjectPPsController::class, 'index'])->name('subjects.index');
    Route::post('/subject', [SubjectPPsController::class, 'store'])->name('subjects.store');
    Route::get('/subject/create', [SubjectPPsController::class, 'create'])->name('subjects.create');
    Route::get('/subject/{subject}/edit', [SubjectPPsController::class, 'edit'])->name('subjects.edit');
    Route::post('/subject/{subject}', [SubjectPPsController::class, 'update'])->name('subjects.update');
    Route::get('/subject/{subject}', [SubjectPPsController::class, 'destroy'])->name('subjects.destroy');
    Route::get('/search', [SubjectPPsController::class, 'search'])->name('search');

    Route::get('/timetable', [TimetablesController::class, 'index'])->name('timetable.index');

    Route::get('/dashboard', [DashboardsController::class, 'index'])->name('dashboard');

    Route::get('/week', [WeeksController::class, 'index'])->name('weeks.index');
    Route::post('/week', [WeeksController::class, 'store'])->name('weeks.store');
    Route::get('/week/create', [WeeksController::class, 'create'])->name('weeks.create');
    Route::get('/week/{week}/edit', [WeeksController::class, 'edit'])->name('weeks.edit');
    Route::post('/week/{week}', [WeeksController::class, 'update'])->name('weeks.update');
    Route::get('/week/{week}', [WeeksController::class, 'destroy'])->name('weeks.destroy'); 
});
