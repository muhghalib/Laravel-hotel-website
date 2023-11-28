<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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

Route::redirect('/','/home', 302);

Route::get('/generate/{password}',function($password){
    echo Hash::make($password);
});

Auth::routes([ "verify"=>true, 'reset'=>true, 'register'=> true ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//for admin,tamu, and resepsionis
Route::middleware(['auth'])->group(function(){
    Route::prefix('/room')->group(function(){
        Route::get('/api/get', [App\Http\Controllers\RoomController::class, 'get']);
        Route::get('/api/checkroom',[App\Http\Controllers\RoomController::class, 'checkRoom']);
    });
    Route::prefix('/user')->group(function(){
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    });
    Route::prefix('/general/facilities')->group(function(){
        Route::get('/api/get', [App\Http\Controllers\GeneralController::class, 'get']);
    });
});

//for admin
Route::middleware(['admin', 'auth'])->group(function(){
    Route::prefix('/user')->group(function(){
        Route::get('/data', [App\Http\Controllers\UserController::class, 'index']);
        Route::get('/api/data',[App\Http\Controllers\UserController::class, 'data']);
        Route::get('/api/get', [App\Http\Controllers\UserController::class, 'get']);
        Route::post('/api/delete',[App\Http\Controllers\UserController::class, 'delete']);
        Route::post('/api/restore',[App\Http\Controllers\UserController::class, 'restore']);
        Route::post('/api/update',[App\Http\Controllers\UserController::class, 'update']);
    });

    Route::prefix('/room')->group(function(){
        Route::get('/data', [App\Http\Controllers\RoomController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\RoomController::class, 'createIndex']);
        Route::get('data/detail', [App\Http\Controllers\RoomController::class, 'detailIndex']);
        Route::get('/edit/{id}', [App\Http\Controllers\RoomController::class, 'editIndex']);
        Route::post('/api/store',[App\Http\Controllers\RoomController::class, 'store']);
        Route::post('/api/delete', [App\Http\Controllers\RoomController::class, 'delete']);
        Route::post('/api/update',[App\Http\Controllers\RoomController::class, 'update']);

        Route::prefix('/category')->group(function(){
           Route::get('/data', [App\Http\Controllers\RoomCategoryController::class, 'index']);
           Route::get('/api/data', [App\Http\Controllers\RoomCategoryController::class, 'data']);
           Route::get('/api/get', [App\Http\Controllers\RoomCategoryController::class, 'get']);
           Route::post('/api/delete', [App\Http\Controllers\RoomCategoryController::class, 'delete']);
           Route::post('/api/store', [App\Http\Controllers\RoomCategoryController::class, 'store']);
           Route::post('/api/update', [App\Http\Controllers\RoomCategoryController::class, 'update']);
        });
    });
    
    Route::prefix('/general/facilities')->group(function(){
        Route::get('/data', [App\Http\Controllers\GeneralController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\GeneralController::class, 'createIndex']);
        Route::get('/edit', [App\Http\Controllers\GeneralController::class, 'editIndex']);
        Route::get('/api/data', [App\Http\Controllers\GeneralController::class, 'data']);
        Route::post('/api/delete', [App\Http\Controllers\GeneralController::class, 'delete']);
        Route::post('/api/store', [App\Http\Controllers\GeneralController::class, 'store']);
        Route::post('/api/update', [App\Http\Controllers\GeneralController::class, 'update']);
    });

});

//resepsionis
Route::middleware(['resepsionis', 'auth'])->group(function(){
   Route::prefix('/order')->group(function(){
        Route::get('/data', [App\Http\Controllers\OrderController::class, 'index']);
        Route::get('/api/get', [App\Http\Controllers\OrderController::class, 'getWithTrashed']);
        Route::post('/api/forcedeletes', [App\Http\Controllers\OrderController::class, 'forceDeletes']);
        Route::post('/api/update', [App\Http\Controllers\OrderController::class, 'update']);
   });
});

//unverified tamu
Route::middleware(['tamu', 'auth'])->group(function(){
    Route::prefix('/room')->group(function(){
        Route::get('/list',[App\Http\Controllers\RoomController::class, 'index']);
        Route::get('/detail',[App\Http\Controllers\RoomController::class, 'detailIndex']);
    });
});

//verified tamu
Route::middleware(['tamu', 'verified', 'auth'])->group(function(){
    Route::prefix('/order')->group(function(){
        Route::get('/create',[App\Http\Controllers\OrderController::class, 'createIndex']);
        Route::get('/list', [App\Http\Controllers\OrderController::class, 'listIndex']);
        Route::get('/tamu/api/get', [App\Http\Controllers\OrderController::class, 'getWithoutTrashed']);
        Route::post('/store',[App\Http\Controllers\OrderController::class, 'store']);
        Route::post('/softdeletes',[App\Http\Controllers\OrderController::class, 'softDeletes']);
    });
});


