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
                                <li class="breadcrumb-item active">Hồ sơ khách hàng</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Hồ sơ khách hàng</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ asset('assets/systems/avatar-default.jpg') }}"
                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            <h4 class="mb-0 mt-2">Dominic Keller</h4>
                            <p class="text-muted font-14">Founder</p>
                            <a href="{{ route('admin.customer.edit', 1) }}" type="button"
                                class="btn btn-danger btn-sm mb-2">Cập nhật</a>

                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">Thông tin :</h4>
                                <p class="text-muted mb-2 font-13"><strong>Họ tên :</strong> <span class="ms-2">Geneva D.
                                        McKnight</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Giới tính :</strong> <span
                                        class="ms-2">Nam</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Điện thoại :</strong><span class="ms-2">(123)
                                        123 1234</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                        class="ms-2 ">user@email.domain</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Trạng thái :</strong>
                                    <span class="ms-2 ">
                                        <span class="form-check form-check-inline">
                                            <input type="radio" id="customRadio3" name="customRadio1"
                                                class="form-check-input" checked>
                                            <label class="form-check-label" for="customRadio3">Hoạt động</label>
                                        </span>
                                    </span>
                                </p>
                                <p class="text-muted mb-1 font-13"><strong>Địa chỉ :</strong> <span
                                        class="ms-2">USA</span></p>
                            </div>

                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                            class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="header-title">Cài đặt</h4>
                            </div>

                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputPassword2" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                        placeholder="Nhập mật khẩu mới">
                                    <small id="passwordHelp" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Xác nhận mật khẩu">
                                    <small id="passwordHelp2" class="form-text text-danger"></small>
                                </div>
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Lưu
                                    lại</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-uppercase">
                                <i class="mdi mdi-briefcase me-1"></i>
                                Lịch sử bảo trì
                            </h5>
                            <div class="timeline-alt py-0">
                                <div class="timeline-item">
                                    <i class="fas fa-dot-circle bg-info-lighten text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">
                                            Bảo trì cảm biến nhiệt độ
                                        </a>
                                        <small>Nội dung: Thay mới</small>
                                        <p class="mb-0 pb-2">
                                            <small class="text-muted">23/7/2024</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <i class="fas fa-dot-circle bg-info-lighten text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">
                                            Bảo trì cảm biến EC
                                        </a>
                                        <small>Nội dung: Thay mới</small>
                                        <p class="mb-0 pb-2">
                                            <small class="text-muted">23/6/2024</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <i class="fas fa-dot-circle bg-info-lighten text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">
                                            Bảo trì cảm biến nhiệt độ
                                        </a>
                                        <small>Nội dung: Thay mới</small>
                                        <p class="mb-0 pb-2">
                                            <small class="text-muted">23/7/2024</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <i class="fas fa-dot-circle bg-info-lighten text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">
                                            Bảo trì cảm biến EC
                                        </a>
                                        <small>Nội dung: Thay mới</small>
                                        <p class="mb-0 pb-2">
                                            <small class="text-muted">23/6/2024</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                                Giàn thuỷ canh</h5>
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                                    id="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 25px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all text-center" style="width: 30px;">Hình ảnh</th>
                                            <th class="all">Số hiệu</th>
                                            <th>Loại</th>
                                            <th class="text-center">Ngày lắp đặt</th>
                                            <th class="text-center">Ngày bảo trì</th>
                                            <th>Trạng thái</th>
                                            <th class="text-center" style="width: 100px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('assets/systems/station-level-1.jpg') }}"
                                                    alt="contact-img" title="contact-img" class="rounded"
                                                    height="60" />
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html"
                                                        class="text-body">L1-0001</a>
                                                    <br />
                                                    <span class="fas fa-star text-warning"></span>
                                                    <span class="fas fa-star text-warning"></span>
                                                    <span class="fas fa-star text-warning"></span>
                                                    <span class="fas fa-star text-warning"></span>
                                                    <span class="fas fa-star-half text-warning"></span>
                                                </p>
                                            </td>
                                            <td>
                                                Cơ bản
                                            </td>
                                            <td class="text-center">
                                                01/07/2024
                                            </td>
                                            <td class="text-center">
                                                01/08/2024
                                            </td>
                                            <td>
                                                <span class="badge bg-success p-1">Đang hoạt động</span>
                                            </td>

                                            <td class="table-action text-center">
                                                <a href="{{ asset('/admin/station/1') }}" class="action-icon">
                                                    <i class="fal fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#table').DataTable({
            // columns: [{
            //         data: 'id',
            //         name: 'id',
            //         orderable: true
            //     },
            //     {
            //         data: 'full_name',
            //         name: 'full_name'
            //     },
            //     {
            //         data: 'email',
            //         name: 'email',
            //         orderable: true
            //     },
            //     {
            //         data: 'tel',
            //         name: 'tel',
            //         orderable: true
            //     },
            //     {
            //         data: 'user_type',
            //         name: 'user_type',
            //         orderable: true
            //     },
            //     {
            //         data: 'created_at',
            //         name: 'created_at',
            //         orderable: true
            //     },
            //     {
            //         data: 'action',
            //         name: 'action'
            //     },
            // ],
            responsive: true,
            pageLength: $('#_pageLength').val(),
            language: datatableConfigLanguage,
        });
    </script>
@endsection
