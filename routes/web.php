<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Awardees\Create as AwardeesCreate;
use App\Livewire\Awardees\Index as AwardeesIndex;
use App\Livewire\Awardees\Update as AwardeesUpdate;
use App\Livewire\Awardees\View as AwardeesView;
use App\Livewire\Users\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('awardees', AwardeesIndex::class)->name('awardees.index');
    Route::get('awardees/view/{awardee}', AwardeesView::class)->name('awardees.view');
    Route::get('awardees/create', AwardeesCreate::class)->name('awardees.create');
    Route::get('awardees/update/{unit}', AwardeesUpdate::class)->name('awardees.update');


    Route::get('users', Index::class)->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
