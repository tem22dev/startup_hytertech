@use('App\Enums\UserTypeEnum')
@use('App\Enums\GenderEnum')
@use('App\Enums\StatusEnum')
@use('App\Enums\GenderStringEnum')
@use('Illuminate\Support\Facades\Auth')
@extends('admin.main')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hytertech</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Nhân viên</a></li>
                                <li class="breadcrumb-item active">Hồ sơ nhân viên</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Hồ sơ nhân viên</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                            @php
                                $avatar = Auth::user()->avatar ? Auth::user()->avatar : 'assets/systems/avatar-default.jpg';
                                $user_type = Auth::user()->user_type == UserTypeEnum::MEMBER_ADMIN->value ? 'Nhân viên' : 'Root Admin';
                                $gender = '';
                                if (Auth::user()->gender == GenderEnum::MALE->value) {
                                    $gender = GenderStringEnum::MALE_STRING->value;
                                } elseif (Auth::user()->gender == GenderEnum::FEMALE->value) {
                                    $gender = GenderStringEnum::FEMALE_STRING->value;
                                }
                                $ward = Auth::user()->wards;
                                $district = Auth::user()->districts;
                                $city = Auth::user()->cities;
                                $address = Auth::user()->address . ' - ' . $ward->name_ward . ' - ' . $district->name_district . ' - ' . $city->name_city;
                            @endphp
                            <img src="{{ $avatar }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            <h4 class="mb-0 mt-2">{{ Auth::user()->full_name }}</h4>
                            <p class="text-muted font-14">{{ $user_type }}</p>
                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">Thông tin</h4>
                                <p class="text-muted mb-2 font-13"><strong>Họ tên :</strong> <span class="ms-2">{{ Auth::user()->full_name }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Giới tính :</strong> <span class="ms-2">{{ $gender }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Điện thoại :</strong><span class="ms-2">{{ Auth::user()->tel }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 "></span>{{ Auth::user()->email }}</p>
                                <p class="text-muted mb-2 font-13"><strong>Trạng thái :</strong> 
                                    <span class="ms-2 ">
                                        <span class="form-check form-check-inline @if (Auth::user()->status == StatusEnum::ACTIVE->value) form-radio-success @else form-radio-danger @endif">
                                            <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input" checked>
                                            <label class="form-check-label" for="customRadio3">@if (Auth::user()->status == StatusEnum::ACTIVE->value) Hoạt động @else Dừng @endif</label>
                                        </span>
                                    </span>
                                </p>
                                <p class="text-muted mb-1 font-13">
                                    <strong>Địa chỉ :</strong> 
                                    <span class="ms-2">{{ $address }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="header-title">Cài đặt</h4>
                            </div>
                            <form id="form-update-password" class="needs-validation">
                                @csrf
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Mật khẩu cũ <span class="badge badge-danger-lighten">Yêu cầu</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="old_password" class="form-control"
                                            placeholder="Mật khẩu cũ" required name="old_password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        <div class="invalid-feedback error-old_password"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Mật khẩu mới <span class="badge badge-danger-lighten">Yêu cầu</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="new_password" class="form-control"
                                            placeholder="Mật khẩu mới" required name="new_password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        <div class="invalid-feedback error-new_password"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="re_password" class="form-label">Xác nhận mật khẩu <span class="badge badge-danger-lighten">Yêu cầu</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="re_password" class="form-control"
                                            placeholder="Xác nhận mật khẩu" required name="re_password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        <div class="invalid-feedback error-re_password"></div>
                                    </div>
                                </div>
                                <button id="submit-update-password" class="btn btn-success mt-2">
                                    <i class="mdi mdi-content-save"></i> Lưu lại
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Update password
        $('#submit-update-password').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-update-password')[0]);
            let route = `{{ route('admin.account.updatePassword') }}`
            $.ajax({
                type: 'POST',
                url: route,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $('#form-update-password .invalid-feedback').text('');
                    $('#form-update-password .invalid-feedback').removeClass('d-block');

                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#form-update-password').removeClass('was-validated');
                    $('#form-update-password')[0].reset();
                    
                    showNotification("Thành công", "Bạn đã cập nhật mật khẩu thành công", "top-right", "rgba(0,0,0,0.2)","success");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    _this.prop('disabled', false);
                    if(jqXHR.status === 422) {
                        let firstErr = null;
                        let err = jqXHR.responseJSON.errors;
                        for (index in err) {
                            if (firstErr == null) {
                                firstErr = ".error-" + index;
                            }
                            $(`div[class="invalid-feedback error-${index}"]`).addClass('d-block').html(err[index]);
                        }
                        $('html').animate({
                            scrollTop : $(firstErr).offset().top - 200
                        }, 'slow');
                    }
                }
            });
        });
    </script>
@endsection
