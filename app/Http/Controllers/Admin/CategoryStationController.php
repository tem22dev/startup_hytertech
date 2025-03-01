<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateProductCategoryRequest;
use App\Http\Requests\Admin\AdminUpdateProductCategoryRequest;
use App\Services\Admin\CategoryStationService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryStationController extends Controller
{
    public CategoryStationService $categoryStationService;

    public function __construct(
        CategoryStationService $categoryStationService,
    ) {
        $this->categoryStationService = $categoryStationService;
    }

    public function index()
    {
        return view('admin.category-station');
    }

    public function getList()
    {
        $categoryStationService = $this->categoryStationService->getList();

        return DataTables::of($categoryStationService)
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
            ->editColumn('name', function ($item) {
                return ("
                    <span class='fw-semibold'>{$item->name}</span>
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
            ->editColumn('created_at', function ($item) {
                return $item->created_at->format('H:i | d-m-Y');
            })
            ->editColumn('action', function ($item) {
                return ("
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
            ->rawColumns(['checkbox', 'name', 'image', 'created_at', 'action'])
            ->make();
    }

    public function store(AdminCreateProductCategoryRequest $request)
    {
        $result = $this->categoryStationService->store($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function getData(Request $request)
    {
        $result = $this->categoryStationService->getData($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function update(AdminUpdateProductCategoryRequest $request)
    {
        $result = $this->categoryStationService->update($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function delete(Request $request)
    {
        $result = $this->categoryStationService->delete($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
