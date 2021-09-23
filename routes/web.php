<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::post('/contact', [PagesController::class, 'send_mail'])->name('send.mail');


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [ProjectController::class, 'index'])->name('dashboard');

    Route::get('/projects', [ProjectController::class, 'projects'])->name('projects');
    Route::get('/add-project', [ProjectController::class, 'create'])->name('add.project');

    Route::get('/archived-projects', [ProjectController::class, 'archived_projects'])->name('archived.projects');

    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('edit.project');
    Route::put('/project/{id}/update', [ProjectController::class, 'update'])->name('update.project');

    Route::get('/project/{id}/delete', [ProjectController::class, 'show'])->name('delete.project');
    Route::delete('/project/{id}/destroy', [ProjectController::class, 'destroy'])->name('destroy.project');

    Route::put('/project/{id}/archive', [ProjectController::class, 'archive'])->name('archive.project');

    Route::post('/store-project', [ProjectController::class, 'store'])->name('store.project');

    Route::get('/settings', [SettingsController::class, 'index'])->name('index.settings');
    Route::put('/settings', [SettingsController::class, 'registration'])->name('update.settings');

    Route::get('/users', [UserController::class, 'index'])->name('index.users');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('update.user');

});



require __DIR__.'/auth.php';
