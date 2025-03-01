<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\CustomerController;
use App\Http\Controllers\Mobile\JWTAuthController;
use App\Http\Controllers\Mobile\AddressController;
use App\Http\Controllers\Mobile\StationController;
use App\Http\Controllers\Mobile\SensorController;
use App\Http\Controllers\Mobile\MeasureController;

Route::group([
    'prefix' => 'mobile',
], function() {
    // JWT Authenticate requests:
    Route::get('/login', [JWTAuthController::class, 'requireLogin']);
    
    Route::post('/login', [JWTAuthController::class, 'login'])->name('login');
    Route::post('/logout', [JWTAuthController::class, 'logout'])->middleware('auth:mobile')->name('logout');
    Route::post('/refresh', [JWTAuthController::class, 'refresh'])->middleware('auth:mobile')->name('refresh');
    Route::post('/me', [JWTAuthController::class, 'me'])->middleware('auth:mobile')->name('me');

    // Get address:
    Route::get('/cities', [AddressController::class, 'getCities'])->middleware('auth:mobile');
    Route::get('/districts/{city_id}', [AddressController::class, 'getDistrictsByCityId'])->middleware('auth:mobile');
    Route::get('/wards/{district_id}', [AddressController::class, 'getWardsByDistrictId'])->middleware('auth:mobile');
    
    // Customer:
    Route::put('/update/{id}', [CustomerController::class, 'updateProfile'])->middleware('auth:mobile');
    Route::post('/update/avatar/{id}', [CustomerController::class, 'updateAvatar'])->middleware('auth:mobile');

    // Stations:
    Route::get('/stations/info/{id}', [StationController::class, "getStationInfo"])->middleware('auth:mobile');
    Route::get('/stations/{user_id}', [StationController::class, "getStationsOfUser"])->middleware('auth:mobile');

    // Sensors:
    Route::get('/sensors', [SensorController::class, 'getSensorsOfStation'])->middleware('auth:mobile');
    Route::get('/sensors/info/{id}', [SensorController::class, 'getSensorInfo'])->middleware('auth:mobile');
    Route::put('/sensors/status/{id}', [SensorController::class, 'updateStatus'])->middleware('auth:mobile');
    Route::get('/sensors/values', [SensorController::class, 'getSensorValues'])->middleware('auth:mobile');

    // Measures:
    Route::get('/measures', [MeasureController::class, 'getMeasuresOfSensor'])->middleware('auth:mobile');
});