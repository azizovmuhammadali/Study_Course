<?php

use App\Http\Controllers\V1\api\Admin\CategoryController;
use App\Http\Controllers\V1\api\Admin\CourseController;
use App\Http\Controllers\V1\api\User\CourseController as Course;
use App\Http\Controllers\V1\api\User\CategoryController as Category;
use App\Http\Controllers\V1\api\Admin\UserController;
use App\Http\Controllers\V1\api\User\UserController as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware(['lang'])->group(function () {
Route::prefix('admin')->group(function(){
    Route::post('register',[UserController::class,'register']);
    Route::post('login',[UserController::class,'login']);
    Route::middleware(['admin','auth:sanctum'])->group(function(){
        Route::get('logout',[UserController::class,'logout']);
        Route::apiResource('categories',CategoryController::class);
        Route::apiResource('courses',CourseController::class);
    });
});
  Route::prefix('user')->group(function(){
    Route::post('register',[User::class,'register']);
    Route::post('login',[User::class,'login']);
    Route::middleware(['auth:sanctum'])->group(function(){
      Route::get('show/{id}',[User::class,'show']);
      Route::put('update/{id}',[User::class,'update']);
      Route::delete('delete/{id}',[User::class,'delete']);
      Route::get('logout',[User::class,'logout']);
      Route::get('categories',[Category::class,'index']);
      Route::get('categories/{id}',[Category::class,'show']);
      Route::get('courses',[Course::class,'index']);
      Route::get('courses/{id}',[Course::class,'show']);
    });
  });
});
