<?php

namespace App\Http\Controllers\Admin;

use App\Enums\GenderEnum;
use App\Enums\GenderStringEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerCreateAccountRequest;
use App\Http\Requests\Admin\CustomerUpdateAccountRequest;
use App\Models\City;
use App\Services\Admin\CityService;
use App\Services\Admin\CustomerService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public CustomerService $customerService;
    public CityService $cityService;

    public function __construct(
        CustomerService $customerService,
        CityService $cityService,
    ){
        $this->customerService = $customerService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function getList()
    {
        $customer = $this->customerService->getList();

        return DataTables::of($customer)
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
            ->editColumn('created_at', function($item) {
                return $item->created_at->format('H:i | d-m-Y');
            })
            ->editColumn('action', function($item) {
                $routeEdit = route('admin.customer.edit', $item->id);
                $routeProfile = route('admin.customer.profile', $item->id);

                return ("
                    <a href='{$routeProfile}' class='action-icon'> 
                        <i class='fal fa-eye'></i>
                    </a>
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
            ->rawColumns(['checkbox', 'full_name', 'status', 'tel', 'gender', 'address', 'created_at', 'action'])
            ->make();
    }

    public function add()
    {
        $cities = $this->cityService->getAllCity();

        return view('admin.customer.add', compact('cities'));
    }

    public function store(CustomerCreateAccountRequest $request)
    {
        $result = $this->customerService->store($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function edit(Request $request)
    {
        $cities = $this->cityService->getAllCity();
        $customer = $this->customerService->getCustomerUpdate($request);

        return view('admin.customer.edit', compact(
            'cities',
            'customer',
        ));
    }

    public function update(CustomerUpdateAccountRequest $request)
    {
        $result = $this->customerService->update($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function updateStatus(Request $request)
    {
        $result = $this->customerService->updateStatus($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }

    public function profile()
    {
        return view('admin.customer.profile');
    }

    public function delete(Request $request)
    {
        $result = $this->customerService->delete($request);

        if ($result) {
            return $this->responseDataSuccess($result);
        }

        return $this->responseMessageBadrequest();
    }
}
