<?php

use App\Models\Profile;
use App\Models\Project;
use App\Models\Quality;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\ToolBoxController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/new', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/quality', [QualityController::class, 'store'])->name('quality.store');
    Route::delete('/quality/{quality}', [QualityController::class, 'destroy'])->name('quality.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/toolbox', [ToolBoxController::class, 'store'])->name('toolbox.store');
    Route::delete('/toolbox/{toolbox}', [ToolBoxController::class, 'destroy'])->name('toolbox.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';