<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TaskController;
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

Route::group(['middleware'=> 'locale'],function(){
    Route::get('change-language/{language}', [Controller::class, 'changeLanguage'])->name('tasks.change-language');
    Route::get('/', function () {
        return view('home');
    });

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/create', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/{id}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
    
});
});