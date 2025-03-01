<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GenderEnum;
use App\Enums\GenderStringEnum;
use App\Enums\StatusEnum;
use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateAccountRequest;
use App\Http\Requests\Admin\AdminUpdateAccountRequest;
use App\Http\Requests\Admin\AdminUpdatePasswordAccountRequest;
use App\Models\City;
use App\Services\Admin\AccountService;
use App\Services\Admin\CityService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Events\UpdateChart;

class AccountController extends Controller
{
    private AccountService $accountService;
    public CityService $cityService;

    public function __construct(
        AccountService $accountService,
        CityService $cityService,
    ){
        $this->accountService = $accountService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        return view('admin.account.index');
    }

    public function getList()
    {
        $accounts = $this->accountService->getList();

        return DataTables::of($accounts)
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
            ->editColumn('full_name', function($item) {
                $avatar = $item->avatar ?? 'assets/systems/avatar-default.jpg';

                return ("
                    <img src='{$avatar}' alt='{$item->full_name}' class='me-2 rounded-circle' height='30' width='30'>
                    <a href='javascript:void(0);' class='text-body fw-semibold'>{$item->full_name}</a>
                ");
            })
            ->editColumn('tel', function($item) {
                return ("
                    <span class='fw-semibold'>{$item->tel}</span>
                ");
            })
            ->editColumn('status', function($item) {
                $checked = $item->status == StatusEnum::ACTIVE->value ? 'checked' : '';

                return ("
                    <div class='form-check form-checkbox-success mb-2'>
                        <input 
                            id='{$item->id}'
                            data-id='{$item->id}' 
                            type='checkbox' 
                            class='form-check-input update-status' 
                            name='status'
                            $checked
                        >
                        <label class='form-check-label' for='{$item->id}'>Hoạt động</label>
                    </div>
                ");
            })
            ->editColumn('gender', function($item) {
                if ($item->gender == GenderEnum::MALE->value) {
                    return GenderStringEnum::MALE_STRING->value;
                } else if ($item->gender == GenderEnum::FEMALE->value) {
                    return GenderStringEnum::FEMALE_STRING->value;
                }

                return null;
            })
            ->editColumn('address', function($item) {
                $city = City::find($item->city_id);
                
                return $city->name_city;
            })
            ->editColumn('user_type', function($item) {
                $user_type = $item->user_type == UserTypeEnum::MEMBER_ADMIN->value ? 'Nhân viên' : '';

                return ("
                    <span class='badge bg-primary'>{$user_type}</span>
                ");
            })
            ->editColumn('created_at', function($item) {
                return $item->created_at->format('H:i | d-m-Y');
            })
            ->editColumn('action', function($item) {
                $routeEdit = route('admin.account.edit', $item->id);

                return ("
                    <a href='{$routeEdit}' class='action-icon'> 
                        <i class='mdi mdi-square-edit-outline'></i>
                    </a>
                    <a 
                        data-id='{$item->id}'
                        href='javascript:void(0);' 
                        class='action-icon btn-delete' 
                        data-bs-toggle='modal' 
                        data-bs-target='#model-delete'
                    >
                        <i class='mdi mdi-delete'></i>
                    </a>
                ");
            })
            ->rawColumns(['checkbox', 'full_name', 'status', 'tel', 'gender', 'address', 'user_type', 'created_at', 'action'])
            ->make();
    }

    public function add()
    {
        $cities = $this->cityService->getAllCity();

        return view('admin.account.add', compact('cities'));
    }

    public function store(AdminCreateAccountRequest $request)
    {
        $result = $this->accountService->store($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function edit(Request $request)
    {
        $cities = $this->cityService->getAllCity();
        $user = $this->accountService->getUserUpdate($request);

        return view('admin.account.edit', compact(
            'cities',
            'user',
        ));
    }

    public function update(AdminUpdateAccountRequest $request)
    {
        $result = $this->accountService->update($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function updateStatus(Request $request)
    {
        $result = $this->accountService->updateStatus($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function profile()
    {
        return view('admin.account.profile');
    }

    public function delete(Request $request)
    {
        $result = $this->accountService->delete($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function updatePassword(AdminUpdatePasswordAccountRequest $request)
    {
        $result = $this->accountService->updatePassword($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
