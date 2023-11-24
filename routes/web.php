<?php

use App\Livewire\Project\ProjectCreate;
use App\Livewire\Project\ProjectDetails;
use App\Livewire\Project\ProjectList;
use App\Livewire\Project\ProjectTable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ProjectList::class)->name('home');

Route::get('/proyecto/{slug}', ProjectDetails::class)->name('project.details');

Route::prefix('admin')->group(function () {
    Route::get('/proyectos', ProjectTable::class)->name('admin.projects');
    Route::get('/proyectos/nuevo', ProjectCreate::class)->name('admin.project.create');
})->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
