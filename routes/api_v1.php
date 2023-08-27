<?php

use App\Http\Controllers\Api\v1\BlogController;
use App\Http\Controllers\Api\v1\LinkContoller;
use App\Http\Controllers\Api\v1\MemeberController;
use App\Models\Memeber;
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


Route::resource('blog', BlogController::class)
 ->except([
     'create', 'edit' 
 ]);

Route::resource('link', LinkContoller::class)
->except([
    'create', 'edit','show','update', 
]);

Route::resource('member', MemeberController::class)
->except([
    'store', 'create', 'edit','destroy',
]);
