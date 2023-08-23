<?php

use App\Http\Controllers\spa\AuthController;
use App\Http\Controllers\spa\PatientController;
use App\Http\Controllers\spa\PatientVitalsController;
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

Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);


    /**
     * PATIENT ROUTES
     */
    Route::prefix('patients')->controller(PatientController::class)->group(function () {
        Route::get('/', [PatientController::class, 'index']);

        Route::prefix('/{patient_id}')->group(function () {
            Route::get('/', [PatientController::class, 'show']);

            /**
             * PHR ROUTES
             */
            Route::prefix('phr')->group(function () {
                /**
                 * VITALS ROUTES
                 */
                Route::prefix('vitals')->controller(PatientVitalsController::class)->group(function () {
                    Route::get('/','index');
                });
            });
        });
    });
});
