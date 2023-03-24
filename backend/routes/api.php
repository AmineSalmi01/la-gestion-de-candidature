<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\condidatController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/insertData', [condidatController::class, 'insert']);
Route::get('/searshEmail/{key}', [condidatController::class, 'searsh']);
Route::get('/getID', [condidatController::class, 'selectID']);
Route::put('/editIdea/{id}', [condidatController::class, 'editIdea']);
Route::get('/Idea/{id}', [condidatController::class, 'getIdea']);
Route::get('/condidat', [condidatController::class, 'index']);

Route::put('/valider/{id}', [condidatController::class, 'valideIdea']);
Route::get('/getData', [condidatController::class, 'gatData']);
Route::get('/selectCount', [condidatController::class, 'selectCount']);
Route::delete('/delete', [condidatController::class, 'delete']);

