<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\SensorController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryStationController;
use App\Http\Controllers\Admin\MeasureController;
use App\Http\Controllers\Admin\MeasurementQuantityController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\ProcessSensorController;
use App\Http\Controllers\Outside\HomeController;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('admin/login', [AdminAuthController::class, 'index'])
    ->middleware('checkLoginPageAdmin')
    ->name('admin.loginView');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/getDataSensor', [DashboardController::class, 'getDataSensor'])->name('admin.dashboard.getDataSensor');


    // Account
    Route::get('/account', [AccountController::class, 'index'])->name('admin.account');
    Route::get('/account/get-list', [AccountController::class, 'getList'])->name('admin.account.getList');
    Route::get('/account/add', [AccountController::class, 'add'])->name('admin.account.add');
    Route::post('/account/store', [AccountController::class, 'store'])->name('admin.account.store');
    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::post('/account/update', [AccountController::class, 'update'])->name('admin.account.update');
    Route::post('/account/update-status', [AccountController::class, 'updateStatus'])->name('admin.account.updateStatus');
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('admin.account.profile');
    Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('admin.account.updatePassword');
    Route::post('/account/delete', [AccountController::class, 'delete'])->name('admin.account.delete');

    // Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer');
    Route::get('/customer/get-list', [CustomerController::class, 'getList'])->name('admin.customer.getList');
    Route::get('/customer/add', [CustomerController::class, 'add'])->name('admin.customer.add');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::post('/customer/update', [CustomerController::class, 'update'])->name('admin.customer.update');
    Route::post('/customer/update-status', [CustomerController::class, 'updateStatus'])->name('admin.customer.updateStatus');
    Route::get('/customer/profile/{id}', [CustomerController::class, 'profile'])->name('admin.customer.profile');
    Route::post('/customer/delete', [CustomerController::class, 'delete'])->name('admin.customer.delete');

    // Station
    Route::get('/station', [StationController::class, 'index'])->name('admin.station');
    Route::get('/station/get-list', [StationController::class, 'getList'])->name('admin.station.getList');
    Route::get('/station/add', [StationController::class, 'add'])->name('admin.station.add');
    Route::get('/station/edit/{id}', [StationController::class, 'edit'])->name('admin.station.edit');
    Route::get('/station/{id}', [StationController::class, 'detail'])->name('admin.station.detail');
    Route::post('/station/updateStatus', [StationController::class, 'updateStatus'])->name('admin.station.updateStatus');
    Route::get('/admin/station/getDataSensor', [StationController::class, 'getDataSensor'])->name('admin.station.getDataSensor');
    Route::post('/admin/station/getdata', [StationController::class, 'getData'])->name('admin.station.getdata');


    // Measure
    Route::get('/measure', [MeasureController::class, 'index'])->name('admin.measure');
    Route::get('/measure/get-list', [MeasureController::class, 'getList'])->name('admin.measure.getList');
    Route::post('/measure/store', [MeasureController::class, 'store'])->name('admin.measure.store');
    Route::get('/measure/getData', [MeasureController::class, 'getData'])->name('admin.measure.getData');
    Route::post('/measure/update', [MeasureController::class, 'update'])->name('admin.measure.update');
    Route::post('/measure/delete', [MeasureController::class, 'delete'])->name('admin.measure.delete');

    // Category station
    Route::get('/category-station', [CategoryStationController::class, 'index'])->name('admin.categoryStation');
    Route::get('/category-station/get-list', [CategoryStationController::class, 'getList'])->name('admin.categoryStation.getList');
    Route::post('/category-station/store', [CategoryStationController::class, 'store'])->name('admin.categoryStation.store');
    Route::get('/category-station/getData', [CategoryStationController::class, 'getData'])->name('admin.categoryStation.getData');
    Route::post('/category-station/update', [CategoryStationController::class, 'update'])->name('admin.categoryStation.update');
    Route::post('/category-station/delete', [CategoryStationController::class, 'delete'])->name('admin.categoryStation.delete');

    // Sensor
    Route::get('/sensor', [SensorController::class, 'index'])->name('admin.sensor');
    Route::get('/sensor/get-list', [SensorController::class, 'getList'])->name('admin.sensor.getList');
    Route::post('/sensor/store', [SensorController::class, 'store'])->name('admin.sensor.store');
    Route::get('/sensor/getData', [SensorController::class, 'getData'])->name('admin.sensor.getData');
    Route::post('/sensor/update', [SensorController::class, 'update'])->name('admin.sensor.update');
    Route::post('/sensor/delete', [SensorController::class, 'delete'])->name('admin.sensor.delete');

    // Measurement quantities
    Route::get('/measurement-quantity/getData', [MeasurementQuantityController::class, 'getData'])->name('admin.measurement.getData');
    Route::post('/measurement-quantity/update', [MeasurementQuantityController::class, 'update'])->name('admin.measurement.update');

    // Maintenance
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('admin.maintenance');
    Route::get('/maintenance/add', [MaintenanceController::class, 'add'])->name('admin.maintenance.add');
    Route::get('/maintenance/{id}', [MaintenanceController::class, 'detail'])->name('admin.maintenance.detail');

    // Route get address
    Route::get('/districts/{city_id}', [AddressController::class, 'getDistrictByCity'])->name('admin.district.byCity');
    Route::get('/wards/{city_id}', [AddressController::class, 'getWardByDistrict'])->name('admin.ward.byDistrict');

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::post('sensor-values/create', [ProcessSensorController::class, 'store']);
Route::post('get-sensor', [ProcessSensorController::class, 'get_sensor']);
Route::post('get-sensor-status', [ProcessSensorController::class, 'get_sensor_status']);

Route::get('csrf-token', function () {
    return response()->json([
        'csrf_token' => csrf_token(),
    ]);
})->middleware('check');

Route::get('get-customer', [CustomerAuthController::class, 'get_customer']);
