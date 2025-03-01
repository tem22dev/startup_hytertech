<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SensorStatusEnum;
use App\Enums\StatusSensorEnum;
use App\Enums\StatusStationEnum;
use App\Events\UpdateChart;
use App\Events\UpdateStatusStation;
use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\SensorValue;
use App\Models\StationSensor;
use App\Services\Admin\StationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StationController extends Controller
{
    public StationService $stationService;

    public function __construct(
        StationService $stationService
    ) {
        $this->stationService = $stationService;
    }

    public function index()
    {
        return view('admin.station.index');
    }

    public function getList()
    {
        $station = $this->stationService->getList();

        return DataTables::of($station)
            ->editColumn('checkbox', function () {
                return ("
                    <td>
                        <div class='form-check'>
                            <input type='checkbox' class='form-check-input' id='customCheck2'>
                            <label class='form-check-label' for='customCheck2'>&nbsp;</label>
                        </div>
                    </td>
                ");
            })
            ->editColumn('image', function ($item) {
                return ("
                    <img src='{$item->image}'
                        alt='contact-img' class='rounded'
                        height='60'
                    />
                ");
            })
            ->editColumn('name', function ($item) {
                // $routeDetail = route('admin.station.detail', $item->id);

                return ("
                    <h4>
                        <a
                            href=''
                            class='badge badge-primary-lighten text-decoration-underline link-offset-2'
                        >{$item->name}</a>
                    </h4>
                ");
            })
            ->editColumn('customer_id', function ($item) {
                $customer = $item->customer;

                return ("
                    <p class='mb-0'>
                        <a class='text-decoration-underline link-offset-2' href=''>{$customer->full_name}</a>
                    </p>
                ");
            })
            ->editColumn('status', function ($item) {
                $status = $item->status == StatusStationEnum::ACTIVE->value ?
                    "<span class='badge bg-success p-1'>Đang hoạt động</span>"
                    :
                    "<span class='badge bg-danger p-1'>Ngừng hoạt động</span>";
                return $status;
            })
            ->editColumn('created_at', function ($item) {
                return $item->date_created_at;
            })
            ->editColumn('action', function ($item) {
                return ("
                    <a
                        data-id='{$item->id}'
                        data-name='{$item->name}'
                        href='javascript:void(0);'
                        class='action-icon btn-update'
                        data-bs-toggle='modal'
                        data-bs-target='#modal-update'
                    >
                        <i class='mdi mdi-square-edit-outline'></i>
                    </a>
                    <a
                        data-id='{$item->id}'
                        href='javascript:void(0);'
                        class='action-icon btn-delete'
                        data-bs-toggle='modal'
                        data-bs-target='#modal-delete'
                    >
                        <i class='mdi mdi-delete'></i>
                    </a>
                ");
            })
            ->rawColumns(['checkbox', 'name', 'image', 'customer_id', 'status', 'created_at', 'action'])
            ->make();
    }

    public function getDataSensor(Request $request)
    {
        $id = $request->id;

        $data = SensorValue::select('sensor_values.value', 'sensor_values.created_at', 'sensors.name', 'sensor_values.sensor_id')
            ->join('sensors', 'sensor_values.sensor_id', '=', 'sensors.id')
            ->where('sensor_values.station_id', $id)
            ->orderBy('sensor_values.id', 'asc')
            ->get();

        return response()->json($data);
    }


    public function add()
    {
        return view('admin.station.add');
    }

    public function detail($id)
    {
        return view('admin.station.detail', ['id' => $id]);
    }

    public function edit($id)
    {
        return view('admin.station.edit', ['id' => $id]);
    }

    public function getdata(Request $request)
    {

        $sensor = Sensor::select('sensors.id', 'sensors.name','sensors.image', 'station_sensors.status', 'pins.pin')
            ->join('station_sensors', 'station_sensors.sensor_id', 'sensors.id')
            ->join('pin_station_sensors', 'station_sensors.sensor_id', 'pin_station_sensors.sensor_id')
            ->join('pins', 'pins.id', 'pin_station_sensors.pin_id')
            ->where('station_sensors.station_id', $request->id)
            ->where('sensors.type', StatusSensorEnum::DIEU_KHIEN_DONG_CO)
            ->get();

            $sensor->transform(function ($sensors) {
                $sensors->image = asset($sensors->image);
                return $sensors;
            });
        return response()->json($sensor);
    }

    public function updateStatus(Request $request)
    {
        $sensor_id = $request->status;
        if ($sensor_id) {
            foreach ($sensor_id as $key => $value) {
                $station_sensor = StationSensor::find($request->id)->where('sensor_id', $key);
                $station_sensor->update(['status' => $value]);
            }
        }
        event(new UpdateStatusStation(['text' => 'status' ]));
        return response()->json(['message' => 'Cập nhật thành công']);
    }
}
