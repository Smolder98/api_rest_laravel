<?php

use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get('users', [UserController::class, 'index']);

// Route::get('users/{user}', [UserController::class, 'show']);

Route::get('usersGroupCreates/{id}', [UserController::class, 'userGroupsCreates']);

Route::get('usersGroup/{id}', [UserController::class, 'groupsUsers']);

// Route::put('users/{user}', [UserController::class, 'update']);

// Route::delete('users/{user}', [UserController::class, 'destroy']);


Route::apiResource('users', UserController::class);

Route::apiResource('groups', GroupController::class);
