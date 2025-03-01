<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateMeasureRequest;
use App\Http\Requests\Admin\AdminUpdateMeasureRequest;
use App\Services\Admin\MeasureService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MeasureController extends Controller
{
    public MeasureService $measureService;

    public function __construct(MeasureService $measureService)
    {
        $this->measureService = $measureService;
    }

    public function index()
    {
        return view('admin.list-measure');
    }

    public function getList()
    {
        $accounts = $this->measureService->getList();

        return DataTables::of($accounts)
            ->addColumn('selected', function () {
                return '';
            })
            ->addColumn('action', function ($object) {
                return $object->id;
            })
            ->editColumn('created_at', function ($object) {
                return $object->date_created_at;
            })
            ->make(True);
    }

    public function store(AdminCreateMeasureRequest $request)
    {
        $result = $this->measureService->store($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getData(Request $request)
    {
        $result = $this->measureService->getData($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function update(AdminUpdateMeasureRequest $request)
    {
        $result = $this->measureService->update($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function delete(Request $request)
    {
        $result = $this->measureService->delete($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
