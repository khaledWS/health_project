<?php

use App\Http\Controllers\spa\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [AuthController::class, 'login']);



Route::post('old-login', function (Request $request) {

    // API endpoint for the login request
    $loginEndpoint = 'https://qlick-health-php.test/index.php/users/startlogin';
    
    
    
    // Create a new Guzzle client
    $client = new Client([
    'verify' => false, // Disable SSL verification
]);
    
    // Define the login credentials (email and password)
    $credentials = [
                'email' => 't-doctor@gmail.com',
            'password' => '12345678',
    ];
    
    // Send a POST request with form parameters
    $response = $client->post($loginEndpoint, [
        'form_params' => $credentials,
    ]);
    
    // Get the response body as a JSON object
    $responseBody = json_decode($response->getBody(), true);
    if((string) $response->getBody() == " you are logging in  <script>$('.alert').removeClass('alert-info');</script><script>$('.alert').addClass('alert-success');</script><script> location.href = 'https://qlick-health-php.test\/admin/index.php/admin/admin/dashboard' </script>"){
        $desiredCookieValue = null;
        foreach ($response->getHeader('Set-Cookie') as $cookie) {
            $parts = explode('=', $cookie, 2);
            if (count($parts) === 2 && trim($parts[0]) === 'ci_session') {
                $desiredCookieValue =  trim($parts[1]);
            }
        }
        // dd($desiredCookieValue);
        session(['ci_session' => $desiredCookieValue]);
        // dd(session('ci_session'));
    }
});


Route::post('old-patients', function (Request $request) {
dd(session('ci_session'));
    // API endpoint for the login request
    $loginEndpoint = 'https://qlick-health-php.test/admin/index.php/doctor/Doctor/patients';
    
    
    
    // Create a new Guzzle client
    $client = new Client([
    'verify' => false, // Disable SSL verification
]);
    
    // Send a POST request with form parameters
    $response = $client->get($loginEndpoint, [
        'headers' => [
            'Cookie' => session('ci_session'), // Include the stored cookie in the request
        ]
    ]);


    dd((string) $response->getBody());
});