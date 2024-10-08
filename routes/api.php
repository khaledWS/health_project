<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', function (Request $request) {
    Auth::loginUsingId(1);
    if(auth()->user()){
      return   auth()->user();
    }
    return false;
});



Route::post('/Anyhub_mio/forwardtelemetry', function (Request $request){
  DB::connection('mysql2')->table('hl7_anyhub_mio_results')->insert([
    'data' => json_encode($request->all())
  ]);
});