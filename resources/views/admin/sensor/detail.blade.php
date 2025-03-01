@use('App\Enums\SensorStatusEnum')
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
                                <li><i class="mx-2 fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.sensor') }}" class="action-icon">
                                        Cảm biến
                                    </a>
                                </li>
                                <li><i class="mx-2 fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item"><span>{{ $sensor->name }}</span></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cảm biến {{ $sensor->name }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="card card-h-100">
                        <form id="form-update">
                            <div id="basicwizard">
                                <div class=" card-header">
                                    <ul class="nav nav-pills nav-justified mb-4" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#tab-device-update" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 py-2 active" aria-selected="true" role="tab">
                                                <i class="far fa-sensor"></i>
                                                <span class="d-none d-sm-inline">Cảm biến</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#tab-connect-update" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 py-2" aria-selected="false" role="tab">
                                                <i class="far fa-plug"></i>
                                                <span class="d-none d-sm-inline">Kết nối</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="tab-content b-0 mb-0">
                                        <div class="tab-pane active show" id="tab-device-update" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3 d-flex">
                                                        <label class="col-md-4 col-form-label" for="image"></label>
                                                        <div class="col-md-8">
                                                            <img 
                                                                src="{{ asset($sensor->image) }}"
                                                                id="preview-sensor-update"
                                                                class="rounded"
                                                                height="140"
                                                                alt="" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-form-label" for="name">
                                                            Số hiệu
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="name-update"
                                                                name="name" value="{{ $sensor->name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-form-label" for="description">
                                                            Mô tả
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="description-update" name="description" disabled value="{{ $sensor->description }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-connect-update" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3 d-flex">
                                                        <label class="col-md-4 col-form-label" for="image"></label>
                                                        <div class="col-md-8">
                                                            <img 
                                                                src="{{ asset($sensor->image) }}"
                                                                id="preview-sensor-update"
                                                                class="rounded"
                                                                height="140"
                                                                alt="" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-form-label" for="position">
                                                            Giàn
                                                        </label>
                                                        <div class="col-md-8">
                                                            @if($sensor->stationSensor && $sensor->stationSensor->station)
                                                                <h4>
                                                                    <a href="#" 
                                                                       class="badge badge-info-lighten text-decoration-underline link-offset-2">
                                                                       {{ $sensor->stationSensor->station->name }}
                                                                    </a>
                                                                </h4>
                                                            @else
                                                                <h4><span class="badge badge-warning-lighten">Chưa lắp đặt</span></h4>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-form-label" for="status-update">
                                                            Bật/Tắt
                                                        </label>
                                                        <div class="col-md-8 d-flex align-items-center">
                                                            <input type="checkbox" id="status-update"
                                                                data-switch="success" name="status" data-id="{{ $sensor->stationSensor->id }}"
                                                                @if ($sensor->stationSensor && $sensor->stationSensor->status == SensorStatusEnum::ACTIVE->value)
                                                                    checked
                                                                @endif
                                                            />
                                                            <label for="status-update" data-on-label="Bật"
                                                                data-off-label="Tắt"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-form-label" for="status_active-update">
                                                            Trạng thái
                                                        </label>
                                                        <div class="col-md-8 d-flex align-items-center">
                                                            @if($sensor->status_active == SensorStatusEnum::ACTIVE->value)
                                                                <span class="badge bg-success p-1">Đang hoạt động</span>
                                                            @else
                                                                <span class="badge bg-danger p-1">Ngừng hoạt động</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="card card-h-100">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Lịch sử đo đạc</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Giá trị</th>
                                            <th class="text-center">Đơn vị</th>
                                            <th class="text-center">Thời gian</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Biến động thông số đo đạc</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div dir="ltr">
                                <div style="height: 100%; width: 100%;" class="chartjs-chart">
                                    <canvas 
                                        id="high-performing-product" 
                                        style="
                                            display: block; 
                                            box-sizing: border-box;
                                        ">
                                    </canvas>
                                    <script>
                                        var ctx = document.getElementById('high-performing-product').getContext('2d');
                                        var myLineChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                datasets: [
                                                    {
                                                        label: 'Unit 1',
                                                        data: [12, 19, 3, 5, 2, 3, 7],
                                                        borderColor: '#727cf5',
                                                        backgroundColor: '#727cf5',
                                                        fill: false
                                                    },
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        console.log(@json($sensorValues));
        
        // Init table
        let table = $('#table').DataTable({
            responsive: true,
            ajax: {
                url: `{{ route('admin.sensor.getValues') }}`,
                data: function(d) {
                    d.id = {{ $sensor->id }};
                }
            },
            columns: [
                {
                    data: null,
                    name: 'stt',
                    orderable: true,
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'value',
                    name: 'value',
                    orderable: true
                },
                {
                    data: 'measure_id',
                    name: 'measure_id',
                    orderable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true
                }
            ],
            order: [[0, 'desc']],
            pageLength: $('#_pageLength').val(),
            language: datatableConfigLanguage,
        });

        // Update on/off
        $('body').on('change', '#status-update', function() {
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.sensor.updateStatus') }}`,
                data: {
                    status: $(this).prop('checked') ? 1 : 0,
                    id: $(this).attr('data-id'),
                    _token: `{{csrf_token()}}`,
                },
                success: function() {
                    showNotification("Thành công", "Bạn đã cập nhật thành công", "top-right", "rgba(0,0,0,0.2)","success");
                }
            })
        })
    </script>
@endsection