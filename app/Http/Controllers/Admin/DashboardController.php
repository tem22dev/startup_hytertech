<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryStationEnum;
use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\SensorValue;
use App\Models\Station;
use App\Services\Admin\CustomerService;
use App\Services\Admin\StationService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public CustomerService $customerService;
    public StationService $stationService;
    public function __construct(CustomerService $customerService, StationService $stationService )
    {
        $this->customerService = $customerService;
        $this->stationService = $stationService;
    }
    public function index()
    {
        $numberOfCustomer = $this->customerService->getCountCustomerValue();
        
        $basicNumberOfStation = $this->stationService->getNumberOfStation(CategoryStationEnum::CO_BAN);
        $highNumberOfStation = $this->stationService->getNumberOfStation(CategoryStationEnum::CAO_CAP);

        $totalAmountOfStation = $this->stationService->getTotalAmount(CategoryStationEnum::TAT_CA);
        $totalAmountOfBasicStation = $this->stationService->getTotalAmount(CategoryStationEnum::CO_BAN);
        $totalAmountOfHighStation = $this->stationService->getTotalAmount(CategoryStationEnum::CAO_CAP);

        return view('admin.dashboard', [
            'numberOfCustomer' => $numberOfCustomer,
            'basicNumberOfStation' => $basicNumberOfStation,
            'highNumberOfStation' => $highNumberOfStation,
            'totalAmountOfStation' => $totalAmountOfStation,
            'totalAmountOfHighStation' => $totalAmountOfHighStation,
            'totalAmountOfBasicStation' => $totalAmountOfBasicStation,
        ]);
    }

}
