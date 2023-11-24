<?php

use App\Livewire\Project\ProjectDetails;
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

Route::view('/', 'home');

Route::get('/proyecto/{slug}', function ($slug) {
    return view('project_details', ['slug' => $slug]);
});

Route::prefix('admin')->group(function () {
    Route::get('/proyectos', function () {
        return view('project_table');
    })->name('admin.projects');
})->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
