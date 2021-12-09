<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/employees')->group(function(){
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/store', [EmployeeController::class, 'store']);
}
);
Route::prefix('/todo-list')->group(function(){
        Route::get('/', [TodoController::class, 'index']);
        Route::get('/in-progress', [TodoController::class, 'inProgress']);
        Route::get('/done', [TodoController::class, 'done']);
    }
);
Route::prefix('/todo')->group(function(){
        Route::post('/store', [TodoController::class, 'store']);
        Route::post('/update/{id}', [TodoController::class, 'update']); 
        Route::post('/status/{id}', [TodoController::class, 'updateStatus']); 
        Route::post('/done/{id}', [TodoController::class, 'done']); 
        Route::post('/{id}', [TodoController::class, 'destroy']);
    }
);