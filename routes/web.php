<?php

use App\Http\Controllers\SubjectPPsController;
use App\Http\Controllers\TimetablesController;
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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::group(['auth:sanctum', 'verified'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Routes for Subject
    Route::get('/subject', [SubjectPPsController::class, 'index'])->name('subjects.index');
    Route::post('/subject', [SubjectPPsController::class, 'store'])->name('subjects.store');
    Route::get('/subject/create', [SubjectPPsController::class, 'create'])->name('subjects.create');
    Route::get('/subject/{subject/show', [SubjectPPsController::class, 'show'])->name('subjects.show');
    Route::get('/subject/{subject}/edit', [SubjectPPsController::class, 'edit'])->name('subjects.edit');
    Route::post('/subject/{subject}', [SubjectPPsController::class, 'update'])->name('subjects.update');
    Route::get('/subject/{subject}', [SubjectPPsController::class, 'destroy'])->name('subjects.destroy');

    //Routes for Timetable
    Route::get('/timetable', [TimetablesController::class, 'index'])->name('timetable.index');

});
