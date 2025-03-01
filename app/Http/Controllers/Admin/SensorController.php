<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SensorEnum;
use App\Enums\SensorStringEnum;
use App\Enums\StatusSensorEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateSensorRequest;
use App\Http\Requests\Admin\AdminUpdateSensorRequest;
use App\Services\Admin\SensorService;
use App\Services\Admin\MeasureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class SensorController extends Controller
{
    public SensorService $sensorService;
    public MeasureService $measureService;

    public function __construct(
        SensorService $sensorService,
        MeasureService $measureService
    ) {
        $this->sensorService = $sensorService;
        $this->measureService = $measureService;
    }

    public function index()
    {
        $listMeasure = $this->measureService->getListName();

        return view('admin.sensor.index', compact(
            'listMeasure'
        ));
    }

    public function getList()
    {
        $sensors = $this->sensorService->getList();

        return DataTables::of($sensors)
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
                $avatar = asset($item->image);
                return "
                    <img src='{$avatar}'
                         alt='sensor-img' class='rounded'
                         height='60' />
                ";
            })
            ->editColumn('name', function ($item) {
                return ("
                    <span class='fw-semibold'>{$item->name}</span>
                ");
            })
//            ->editColumn('type', function($object) {
//                return StatusSensorEnum::getKeyByValue($object->type);
//            })
            ->editColumn('created_at', function ($item) {
                return $item->created_at->format('H:i | d-m-Y');
            })
            ->editColumn('action', function ($item) {
                return ("
                    <a
                        data-id='{$item->id}'
                        href='javascript:void(0);'
                        class='action-icon btn-setting'
                        data-bs-toggle='modal'
                        data-bs-target='#modal-setting'
                    >
                        <i class='fad fa-ruler-vertical'></i>
                    </a>
                    <a
                        data-id='{$item->id}'
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
            ->rawColumns(['checkbox', 'name', 'image', 'description', 'type', 'created_at', 'action'])
            ->make();
    }

    public function store(AdminCreateSensorRequest $request)
    {
        $result = $this->sensorService->store($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getData(Request $request)
    {
        $result = $this->sensorService->getData($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function update(AdminUpdateSensorRequest $request)
    {
        $result = $this->sensorService->update($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function delete(Request $request)
    {
        $result = $this->sensorService->delete($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
