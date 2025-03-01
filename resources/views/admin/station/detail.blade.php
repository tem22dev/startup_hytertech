@extends('admin.main')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="fal fa-calendar"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="fal fa-sync"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="fal fa-filter"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Giàn {{ $id }}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="far fa-thermometer-half widget-icon pt-2"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Temperature">Nhiệt độ</h5>
                                <h3 class="mt-3 mb-3">36°C</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-alt-up"></i>
                                        5.27%
                                    </span>
                                    <span class="text-nowrap">10 phút trước</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="far fa-humidity widget-icon pt-2"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Humidity">Độ ẩm</h5>
                                <h3 class="mt-3 mb-3">60%</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2">
                                        <i class="fas fa-arrow-alt-down"></i>
                                        1.08%
                                    </span>
                                    <span class="text-nowrap">5 phút trước</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="fal fa-analytics widget-icon pt-2"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="pH">Nồng độ pH</h5>
                                <h3 class="mt-3 mb-3">20%</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2">
                                        <i class="fas fa-arrow-alt-up"></i>
                                        7.00%
                                    </span>
                                    <span class="text-nowrap">8 phút trước</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="fal fa-analytics widget-icon pt-2"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="EC">Nồng độ EC</h5>
                                <h3 class="mt-3 mb-3">30.56%</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2">
                                        <i class="fas fa-arrow-alt-down"></i>
                                        4.87%
                                    </span>
                                    <span class="text-nowrap">10 phút trước</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="card card-h-100">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title">Biến động thông số đo đạc</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fal fa-ellipsis-v-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div dir="ltr">
                            <div style="height: 300px;" class="chartjs-chart">
                                <canvas 
                                    id="high-performing-product" 
                                    style="display: block; box-sizing: border-box; height: 100%; width: 100%;"">
                                </canvas>
                                <script>
                                    var ctx = document.getElementById('high-performing-product').getContext('2d');
                                    var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                            datasets: [{
                                                    label: 'Unit 1',
                                                    data: [12, 19, 3, 5, 2, 3, 7],
                                                    borderColor: 'rgba(255, 99, 132, 1)',
                                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                    fill: false
                                                },
                                                {
                                                    label: 'Unit 2',
                                                    data: [2, 29, 5, 5, 2, 3, 10],
                                                    borderColor: 'rgba(54, 162, 235, 1)',
                                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                    fill: false
                                                },
                                                {
                                                    label: 'Unit 3',
                                                    data: [3, 10, 13, 15, 22, 30, 25],
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    fill: false
                                                },
                                                {
                                                    label: 'Unit 4',
                                                    data: [20, 15, 10, 5, 2, 1, 0],
                                                    borderColor: 'rgba(153, 102, 255, 1)',
                                                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                                    fill: false
                                                }
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title py-1">Thiết bị được lắp đặt</h4>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                                id="table">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th style="width: 100px">Số hiệu</th>
                                        <th>Trạng thái</th>
                                        <th>Bật / Tắt</th>
                                        <th>Ngày lắp đặt</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>T - 0001</td>
                                        <td>
                                            <span class="badge bg-success p-1">Đang hoạt động</span>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch3" checked data-switch="success"/>
                                            <label class="d-block" for="switch3" data-on-label="Bật" data-off-label="Tắt"></label>
                                        </td>
                                        <td>07/07/2024</td>
                                        <td>
                                            <a href="{{ asset("/admin/sensor/1") }}" class="action-icon text-info">
                                                <i class="fal fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>L - 0001</td>
                                        <td>
                                            <span class="badge bg-success p-1">Đang hoạt động</span>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch4" checked data-switch="success"/>
                                            <label class="d-block" for="switch4" data-on-label="Bật" data-off-label="Tắt"></label>
                                        </td>
                                        <td>07/07/2024</td>
                                        <td>
                                            <a href="{{ asset("/admin/sensor/1") }}" class="action-icon text-info">
                                                <i class="fal fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>Q - 0001</td>
                                        <td>
                                            <span class="badge bg-success p-1">Đang hoạt động</span>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch5" checked data-switch="success"/>
                                            <label class="d-block" for="switch5" data-on-label="Bật" data-off-label="Tắt"></label>
                                        </td>
                                        <td>07/07/2024</td>
                                        <td>
                                            <a href="{{ asset("/admin/sensor/1") }}" class="action-icon text-info">
                                                <i class="fal fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>P - 0001</td>
                                        <td>
                                            <span class="badge bg-success p-1">Đang hoạt động</span>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch6" checked data-switch="success"/>
                                            <label class="d-block" for="switch6" data-on-label="Bật" data-off-label="Tắt"></label>
                                        </td>
                                        <td>07/07/2024</td>
                                        <td>
                                            <a href="{{ asset("/admin/sensor/1") }}" class="action-icon text-info">
                                                <i class="fal fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 order-lg-1">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title">Lịch sử bảo trì</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">Xuất lịch sử</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0 mb-3" data-simplebar style="height: 396px;">
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
                                        Bảo trì cảm biến nhiệt độ
                                    </a>
                                    <small>Nội dung: Thay mới</small>
                                    <p class="mb-0 pb-2">
                                        <small class="text-muted">23/7/2024</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 order-lg-1">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title py-1">Chủ sở hữu</h4>
                    </div>

                    <div class="avatar-lg w-100 text-center">
                        <img src="{{ asset('assets/systems/avatar-default.jpg') }}" alt=""
                            class="rounded-circle img-thumbnail h-100">
                    </div>

                    <hr>

                    <div class="card-body pt-0" style="height: 295px;">
                        <p class="text-muted"><strong>Họ tên:</strong>
                            <span class="ms-2">
                                Nguyễn Văn A
                            </span>
                        </p>

                        <p class="text-muted">
                            <strong>Giới tính: </strong>
                            <span class="ms-2">Nam</span>
                        </p>

                        <p class="text-muted">
                            <strong>Số điện thoại:</strong>
                            <span>(+12) 123 1234 567</span>
                        </p>

                        <p class="text-muted">
                            <strong>Email :</strong>
                            <span class="ms-2">coderthemes@gmail.com</span>
                        </p>

                        <p class="text-muted">
                            <strong>Địa chỉ :</strong>
                            <span class="ms-2">USA</span>
                        </p>

                        <a href="#" class="btn btn-primary w-100 position-relative" style="bottom: -48px">
                            Xem thông tin chi tiết
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
