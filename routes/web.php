<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new_users', function () {
    return view('new_users');
});

Route::post('/reg_new_user', [App\Http\Controllers\RegNewUserController::class, 'new_user'])->name('new_user');

Route::post('/validate', [App\Http\Controllers\HomeController::class, 'validation'])->name('validation');

Route::post('/validate_admin', [App\Http\Controllers\HomeController::class, 'validate_admin'])->name('validate_admin');

Route::get('/new', [App\Http\Controllers\ExperimentController::class, 'new'])->name('new');

Route::get('/settings/edit/{experimentID}', [App\Http\Controllers\SettingsController::class, 'edit'])->name('settings.edit');

Route::post('/settings/create/{id}', [App\Http\Controllers\SettingsController::class, 'create'])->name('settings.create');

Route::post('/create', [App\Http\Controllers\ExperimentController::class, 'create'])->name('create');

Route::get('/update', [App\Http\Controllers\ExperimentController::class, 'update'])->name('update');

Route::post('/update_redirectionLink', [App\Http\Controllers\ExperimentController::class, 'update_redirection_link'])->name('update');

Route::get('/delete', [App\Http\Controllers\ExperimentController::class, 'delete'])->name('delete');

Route::get('/export', [App\Http\Controllers\ExperimentController::class, 'export'])->name('export');

// Route pour créer un nouveau participant
Route::post('/new-participant', [ParticipantController::class, 'store'])->name('new_participant');

// Route pour sauvegarder les données de la pratique
Route::post('/save-practice-data', [ParticipantController::class, 'savePracticeData'])->name('save.practice.data');

// Route pour sauvegarder les données de la tâche
Route::post('/save-task-data', [ParticipantController::class, 'saveTaskData'])->name('save.task.data');

// Ensuite, placez les routes qui capturent tout
Route::get('/{locale}/{instructions}', [App\Http\Controllers\ExperimentController::class, 'index']);
Route::post('/{locale}/{instructions}', [App\Http\Controllers\ExperimentController::class, 'index_post']);