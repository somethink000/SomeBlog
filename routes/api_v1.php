<?php

use App\Http\Controllers\Api\v1\BlogController;
use App\Http\Controllers\Api\v1\LinkContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::resource('blog', BlogController::class);
// ->except([
//     'create', 'edit' 
// ]);

Route::resource('link', LinkContoller::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
