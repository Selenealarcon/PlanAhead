<?php

use App\Http\Controllers\SpaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\TaskController;


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

Route::get('/', [DefaultController::class, 'home'])->name('home');

//// SPACE
Route::group(['prefix' => 'space'], function () {
    //SPACES
    Route::get('/list',  [SpaceController::class, 'list'])->middleware('auth')->name('space_list');
    Route::match(['get', 'post'], '/new',  [SpaceController::class, 'new'])->middleware('auth')->name('space_new');
    Route::match(['get', 'post'], '/edit/{id}',  [SpaceController::class, 'edit'])->middleware('auth')->name('space_edit');
    Route::get('/delete/{id}',  [SpaceController::class, 'delete'])->middleware('auth')->name('space_delete');
    Route::get('/{spaceId}/delete-member/{memberId}',  [SpaceController::class, 'deleteMember'])->name('delete_member');
    Route::post('/emailExists', [SpaceController::class, 'emailExists'])->middleware('auth')->name('email_exists');
    
    //TASKS
    Route::get('/{id}', [TaskController::class, 'list'])->middleware('auth')->name('space');
    Route::match(['get', 'post'], '/{id}/task/new', [TaskController::class, 'new'])->middleware('auth')->name('task_new');
    Route::match(['get', 'post'], '/{space_id}/task/{task_id}/edit', [TaskController::class, 'edit'])->middleware('auth')->name('task_edit');
    Route::match(['get', 'post'], '/{space_id}/task/{task_id}/delete', [TaskController::class, 'delete'])->middleware('auth')->name('task_delete');
    Route::post('/{spaceId}/filter', [TaskController::class, 'filter'])->middleware('auth')->name('task_filter');
    Route::get('/{space_id}/task/{task_id}/deleteItem/{item_id}', [TaskController::class, 'deleteItem'])->middleware('auth')->name('item_delete');

});

