<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URLs
    Route::post("add", [ProductController::class, "add"]);
});

Route::get("ShowAllProducts", [ProductController::class, "ShowAllProducts"]);
Route::get("list/{id}", [ProductController::class, "list"]);
Route::put("update", [ProductController::class, "update"]);
Route::delete("delete/{id}", [ProductController::class, "delete"]);

Route::post("login", [AdminController::class, "login"]);
