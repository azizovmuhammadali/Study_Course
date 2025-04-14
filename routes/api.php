<?php

use App\Http\Controllers\V1\api\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware(['lang'])->group(function () {
 Route::post('admin/register',[UserController::class,'register']);
 Route::post('admin/login',[UserController::class,'login']);
});
