<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('clubs', ClubController::class);
    Route::resource('events', EventController::class);
    Route::get('/mis/clubs', [ClubController::class, 'myclubs'])->name('clubs.my');
    Route::get('solicitar/{clubId}', [SolicitudController::class, 'solicitar'])->name('solicitar.miembro');
    Route::get('solicitud/index', [SolicitudController::class, 'index'])->name('solicitar.index');
    Route::post('solicitud/efectuar/{solicitud}', [SolicitudController::class, 'efectuar'])->name('solicitar.efectuar');

});

require __DIR__.'/auth.php';
