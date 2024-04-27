<?php

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

Route::get('states/{country_id}', [App\Http\Controllers\APIController::class, 'states']);
Route::get('cities/{state_id}', [App\Http\Controllers\APIController::class, 'cities']);
Route::post('check-email', [App\Http\Controllers\APIController::class, 'check_email']);
Route::post('check-email-existing-user', [App\Http\Controllers\APIController::class, 'check_email_existing_user']);

Route::get('school-groups/{school_id}', [App\Http\Controllers\APIController::class, 'school_groups']);
Route::get('activities-by-school/{school_id}', [App\Http\Controllers\APIController::class, 'activities_by_school']);


Route::get('users/{user_id}', [App\Http\Controllers\StudentAPIController::class, 'user']);
Route::get('levels', [App\Http\Controllers\StudentAPIController::class, 'levels']);
Route::get('levels/{level_id}', [App\Http\Controllers\StudentAPIController::class, 'level']);


Route::get('user-top-scores/{user_id}', [App\Http\Controllers\StudentAPIController::class, 'user_top_scores']);
Route::get('user-top-scores-current-month/{user_id}', [App\Http\Controllers\StudentAPIController::class, 'user_top_scores_current_month']);
Route::get('user-top-scores-current-and-previous-month/{user_id}', [App\Http\Controllers\StudentAPIController::class, 'user_top_scores_current_and_previous_month']);

Route::post('start-level', [App\Http\Controllers\StudentAPIController::class, 'start_level']);
Route::post('send-score', [App\Http\Controllers\StudentAPIController::class, 'send_score']);