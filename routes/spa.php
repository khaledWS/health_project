<?php

use App\Http\Controllers\spa\DiagnosisController;
use App\Http\Controllers\spa\PatientSoapController;
use App\Http\Controllers\spa\AuthController;
use App\Http\Controllers\spa\PatientCarePlanController;
use App\Http\Controllers\spa\PatientController;
use App\Http\Controllers\spa\PatientVitalsController;
use App\Http\Controllers\spa\TestCategoryController;
use App\Http\Controllers\spa\TestController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SPA Routes
|--------------------------------------------------------------------------
|
| Here is where you can register The Single Page Application (SPA) routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    UserResource::withoutWrapping();
    return new UserResource(auth()->user());
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
                    Route::get('/', 'index');
                    Route::post('/store', 'store');
                });

                /**
                 * PATIENT TESTS ROUTES
                 */
                Route::prefix('tests')->group(function () {
                    Route::get('single-tests', [PatientController::class, 'get_single_tests']);
                    Route::get('profile-tests', [PatientController::class, 'get-profile-tests']);
                    Route::post('order-test', [TestController::class, 'order-test']);
                });

                /**
                 * PATIENT MEDICATION ROUTES
                 */
                Route::prefix('medication')->group(function () {
                    Route::get('medications', [PatientController::class, 'get-single-tests']);
                    Route::get('mar', [PatientController::class, 'get-profile-tests']);
                    Route::get('mar-logs', [PatientController::class, 'order-test']);
                });

                /**
                 * SOAP ROUTES
                 */
                Route::prefix('soap')->group(function () {
                    Route::get('/index', [PatientSoapController::class, 'index']); //done
                    Route::get('/store', [PatientSoapController::class, 'store']);  //done:
                    Route::get('/export', [PatientSoapController::class, 'export']); //TODO:
                });

                Route::prefix('careplan')->group(function () {
                    Route::get('/index', [PatientCarePlanController::class, 'index']);
                    Route::get('/store', [PatientCarePlanController::class, 'index']);
                    Route::get('/export', [PatientCarePlanController::class, 'index']);
                });
            });
        });
    });


    Route::prefix('tests')->group(function () {
        Route::get('/types', [TestController::class,'getTypes']);
        Route::get('/types/tests', [TestController::class,'getTypeTests']);
        Route::get('/categories', [TestCategoryController::class,'getCategories']);
        Route::get('category/{category_id}/test', [TestController::class,'getCategoryTests']);
        Route::get('/labs', [TestController::class]);
    });


    //Diagnosis route
    Route::get('diagnosis', [DiagnosisController::class,'get']);
});
