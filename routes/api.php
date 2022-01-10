<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todolistController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// route to add items to itemList
Route::post('additem',[todolistController::class,'createItem']);


// route to upload file
Route::post('fileupload',[todolistController::class,'fileupload']);


// route to fetch todolist
Route::get('todolist',[todolistController::class,'todoList']);

// route to fetch items according tonwork status
Route::get('fetch/{param}',[todolistController::class,'fetchItems']);


// route to fetch items according tonwork status
Route::put('updateitem',[todolistController::class,'update']);

// route to fetch items according tonwork status
Route::delete('delete/{id}',[todolistController::class,'deleteItem']);


// route to mark the status of item as complete
Route::put('updateitemstatus/{id}',[todolistController::class,'updateitemstatus']);


// route to mark the status of item as complete
Route::get('reminder',[todolistController::class,'sendEmail']);




