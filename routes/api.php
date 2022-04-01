<?php

use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\NotaController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserGroupController;
use App\Models\UserGroup;
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

/**
 *
 * Usuarios
 */


// Route::get('users', [UserController::class, 'index']);

// Route::get('users/{user}', [UserController::class, 'show']);

// Route::put('users/{user}', [UserController::class, 'update']);

// Route::delete('users/{user}', [UserController::class, 'destroy']);

Route::apiResource('users', UserController::class);

Route::get('usersGroupCreates/{id}', [UserController::class, 'userGroupsCreates']);

Route::get('usersNotasCreates/{id}', [UserController::class, 'userNotasCreates']);

Route::get('usersGroup/{id}', [UserController::class, 'userGroups']);

Route::get('userEmail/{correo}', [UserController::class, 'findUserForCorreo']);


/**
 *
 * Grupos
 */

Route::apiResource('groups', GroupController::class);

Route::get('usuariosDelGrupo/{id}', [GroupController::class, 'groupsUsers']);



/**
 *
 * Grupos - Usuarios
 */
Route::get('usuariosDelGrupoActivos/{idGrupo}', [UserGroupController::class, 'userGroupsActives']);

Route::get('invitacionesPorUsuario/{idUser}', [UserGroupController::class, 'userGroupsInvitated']);

Route::get('gruposDelUsuario/{idUser}', [UserGroupController::class, 'groupsForUserActives']);

Route::get('usuariosAmigos/{idUser}', [UserGroupController::class, 'userFriends']);

Route::post('updateUserGroup', [UserGroupController::class, 'actualizarGrupoUsuario']);

Route::post('getStatusUserGroup', [UserGroupController::class, 'getStatusUserGroup']);

Route::apiResource('groupUsers', UserGroupController::class);



/**
 *
 * Notas
 */

 Route::apiResource('notas', NotaController::class);
