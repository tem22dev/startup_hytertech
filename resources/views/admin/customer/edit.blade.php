@use('App\Enums\GenderEnum')
@use('App\Enums\StatusEnum')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Khách hàng</a></li>
                                <li class="breadcrumb-item active">Cập nhật khách hàng</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cập nhật khách hàng</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="custom-styles-preview">
                                    <form id="form-update" class="needs-validation">
                                        @csrf
                                        <h4 class="header-title mb-3">Thông tin</h4>
                                        <input type="hidden" name="id" id="id_update" value="{{ $customer->id }}">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="full_name">Họ tên 
                                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                                    </label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        id="full_name"
                                                        placeholder="Họ tên" 
                                                        name="full_name" 
                                                        required
                                                        value="{{ $customer->full_name }}"
                                                    >
                                                    <div class="invalid-feedback error-full_name"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="tel">Số điện thoại <span
                                                            class="badge badge-danger-lighten">Yêu cầu</span></label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        id="tel"
                                                        placeholder="Số điện thoại" 
                                                        name="tel" 
                                                        required
                                                        value="{{ $customer->tel }}"
                                                    >
                                                    <div class="invalid-feedback error-tel"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email 
                                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        <input 
                                                            type="email" 
                                                            class="form-control" 
                                                            id="email"
                                                            placeholder="Email" 
                                                            aria-describedby="inputGroupPrepend"
                                                            required 
                                                            name="email"
                                                            value="{{ $customer->email }}"
                                                        >
                                                        <div class="invalid-feedback error-email"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Giới tính</label>
                                                    <select class="form-select" id="gender" name="gender">
                                                        <option value="" hidden>Chọn giới tính</option>
                                                        @foreach (GenderEnum::getValues() as $index => $value)
                                                            <option 
                                                                value={{ $index }}
                                                                @if ($customer->gender == $index)
                                                                    selected
                                                                @endif
                                                            >{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Mật khẩu <span
                                                            class="badge badge-danger-lighten">Yêu cầu</span></label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="password" class="form-control"
                                                            placeholder="Mật khẩu" name="password">
                                                        <div class="input-group-text" data-password="false">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                        <div class="invalid-feedback error-password"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="ward" class="form-label fw-semibold">Trạng thái</label>
                                                        <div class="form-check form-checkbox-success mb-2">
                                                            <input 
                                                                type="checkbox" 
                                                                class="form-check-input" 
                                                                name="status" 
                                                                id="customCheckcolor2" 
                                                                @if ($customer->status == StatusEnum::ACTIVE->value)
                                                                    checked
                                                                @endif
                                                            >
                                                            <label class="form-check-label" for="customCheckcolor2">Hoạt động</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">Tỉnh/thành phố
                                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                                    </label>
                                                    <select class="form-control select2" data-toggle="select2"
                                                        id="city" name="city" required>
                                                        <option></option>
                                                        @foreach ($cities as $city)
                                                            <option 
                                                                value={{ $city->id }}
                                                                @if ($customer->city_id == $city->id)
                                                                    selected
                                                                @endif
                                                            >{{ $city->name_city }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback error-city"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="district" class="form-label">Quận/huyện
                                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                                    </label>
                                                    <select class="form-control select2" data-toggle="select2"
                                                        id="district" name="district" required>
                                                    </select>
                                                    <div class="invalid-feedback error-district"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="ward" class="form-label">Xã/phường/thị trấn
                                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                                    </label>
                                                    <select class="form-control select2" data-toggle="select2"
                                                        id="ward" name="ward" required>
                                                    </select>
                                                    <div class="invalid-feedback error-ward"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="ward" class="form-label">Địa chỉ</label>
                                                    <div class="form-floating">
                                                        <textarea 
                                                            class="form-control" 
                                                            placeholder="Địa chỉ nhà" 
                                                            id="address" 
                                                            style="height: 58px"
                                                            name="address"
                                                        >{{ $customer->address }}</textarea>
                                                        <label for="address">Địa chỉ nhà</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label class="form-label" for="avatar">Ảnh đại diện</label>
                                                            <input
                                                                class="form-control"
                                                                type="file"
                                                                id="avatar"
                                                                name="avatar"
                                                            >
                                                            <div class="invalid-feedback error-avatar"></div>
                                                        </div>
                                                        @php
                                                            $avatar = $customer->avatar ? asset($customer->avatar) : asset('assets/systems/avatar-default.jpg');
                                                        @endphp
                                                        <div class="col-sm-6">
                                                            <img 
                                                                id="preview-avatar"
                                                                src="{{ $avatar }}"
                                                                alt="{{ $customer->full_name }}" class="img-fluid avatar-lg rounded-circle"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" id="submit-update">
                                            <i class="mdi mdi-content-save"></i>
                                            <span>Cập nhật khách hàng</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Model success --}}
    <div id="success-header-modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Đã cập nhật thành công !</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    Bạn có muốn tiếp tục cập nhật ?
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.customer') }}" type="button" class="btn btn-light">Không</a>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Có</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Load data cities/districts/wards
        $(document).ready(function() {
            let city_id = $('#city').val();
            
            $('#city').select2({
                placeholder: "Chọn tỉnh/thành phố"
            });
            $('#city').on('change', function() {
                city_id = $(this).val();

                if (city_id) {
                    $.ajax({
                        url: "{{ route('admin.district.byCity', ':city_id') }}".replace(':city_id', city_id),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty();
                            $('#district').append('<option></option>');
                            $.each(data.data, function(key, value) {
                                $('#district').append(`<option value=${value.id}>${value.name_district}</option>`);
                            });
                        }
                    })
                } else {
                    $('#district').empty();
                }
                $('#ward').empty();
            })

            $('#district').select2({
                placeholder: "Chọn quận/huyện"
            });
            $('#district').on('change', function() {
                district_id = $(this).val();

                if (district_id) {
                    $.ajax({
                        url: "{{ route('admin.ward.byDistrict', ':district_id') }}".replace(':district_id', district_id),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#ward').empty();
                            $('#ward').append('<option></option>');
                            $.each(data.data, function(key, value) {
                                $('#ward').append(`<option value=${value.id}>${value.name_ward}</option>`);
                            });
                        }
                    })
                } else { 
                    $('#ward').empty();
                }
            })

            $('#ward').select2({
                placeholder: "Chọn xã/phường/thị trấn"
            });

            $.ajax({
                url: "{{ route('admin.district.byCity', ':city_id') }}".replace(':city_id', city_id),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#district').empty();
                    let userDistrictId = '{{ $customer->district_id }}';
                    let selected = '';

                    $.each(data.data, function(key, value) {
                        selected = (userDistrictId == value.id) ? 'selected' : '';
                        $('#district').append(`<option value=${value.id} ${selected}>${value.name_district}</option>`);
                    });

                    let district_id = $('#district').val();
                    $.ajax({
                        url: "{{ route('admin.ward.byDistrict', ':district_id') }}".replace(':district_id', district_id),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#ward').empty();
                            let userWardId = '{{ $customer->ward_id }}';
                            let selected = '';

                            $.each(data.data, function(key, value) {
                                selected = (userWardId == value.id) ? 'selected' : '';
                                $('#ward').append(`<option value=${value.id} ${selected}>${value.name_ward}</option>`);
                            });
                        }
                    })
                }
            })
        });

        // Select file avatar
        $('#avatar').change(function(e) {
            let file = e.target.files[0];
            let previewURL = URL.createObjectURL(file);
            
            $('#preview-avatar').attr('src', previewURL);
        });

        // Scroll to top when the "Có" button is clicked
        $('#success-header-modal .btn-success').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        });

        // Reset form
        $('#success-header-modal .btn-light').click(function() {
            $('#form-update')[0].reset();
            $('#city').val(null).trigger('change');
            $('#district').empty();
            $('#ward').empty();
        });
        
        // Update
        $('#submit-update').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-update')[0]);
            let route = `{{ route('admin.customer.update') }}`
            $.ajax({
                type: 'POST',
                url: route,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $('#form-update .invalid-feedback').text('');
                    $('#form-update .invalid-feedback').removeClass('d-block');

                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#form-update').removeClass('was-validated');
                    $('#form-update')[0].reset();
                    $('#success-header-modal').modal('show');
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
