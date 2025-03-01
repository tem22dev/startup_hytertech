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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Giàn thuỷ canh</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title"> Giàn thủy canh</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="{{ route('admin.station.add') }}" class="btn btn-danger mb-2">
                                        <i class="fal fa-plus-circle"></i>
                                        Thêm giàn mới
                                    </a>
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-success mb-2 me-1">
                                            <i class="fal fa-cog"></i>
                                        </button>
                                        <button type="button" class="btn btn-light mb-2 me-1">Export</button>
                                        <button type="button" class="btn btn-light mb-2">Import</button>
                                    </div>
                                </div>
                            </div>
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
                                            <th>Chủ sở hữu</th>
                                            <th>Trạng thái</th>
                                            {{-- <th class="text-center">Ngày lắp đặt</th> --}}
                                            <th class="text-center">Thời gian</th>
                                            <th class="text-center" style="width: 100px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Cập nhật giàn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form cập nhật -->
                    <form id="form-update" method="post" action="{{ route('admin.station.updateStatus') }}">
                        @csrf
                        <input type="hidden" id="update-id" name="id" value="10">
                        <div class="mb-3">
                            <label for="update-name" class="form-label">Tên giàn</label>
                            <input type="text" class="form-control" id="update-name" name="name" readonly=""
                                disabled="">
                        </div>
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                            id="sensor_table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Sensor Name</th>
                                    <th>Sensor Image</th>
                                    <th>Sensor Pin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                    <p class="highcharts-description">
                                        Basic line chart showing trends in a dataset. This chart includes the
                                        <code>series-label</code> module, which adds a label to each line for
                                        enhanced readability.
                                    </p>
                                </figure>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        let station_id = null;
        let btn_status = null;
        var pusher = new Pusher("618d23d7e8c8fbe0ccfb", {
            cluster: "ap1",
        });
        var channel = pusher.subscribe("chart-channel");
        channel.bind("update-chart", function(res) {

            if ($(document).find('#modal-update').hasClass('show')) {
                console.log('sss ' + station_id);
                var scrollPositison = $(document).find('#modal-update').scrollTop();

                if (res.text == 'chart') {
                    $(document).find('#modal-update').scrollTop(scrollPositison);
                    $.ajax({
                        url: "{{ route('admin.station.getDataSensor') }}",
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id: station_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log('data :' + data);
                            let phValues = [];
                            let ecValues = [];
                            let time = [];
                            // Lấy 5 dữ liệu gần nhất
                            let lastFiveData = data.slice(-10);

                            // Kiểm tra xem có dữ liệu hay không
                            if (lastFiveData.length === 0) {
                                console.error("No data available.");
                                return; // Không có dữ liệu
                            }

                            lastFiveData.forEach(item => {
                                const date = new Date(item.created_at);
                                const hours = date.getHours().toString().padStart(2,
                                    '0');
                                const minutes = date.getMinutes().toString().padStart(2,
                                    '0');
                                time.push(`${hours}:${minutes}`);

                                if (item.sensor_id === 1) {
                                    phValues.push(item.value);
                                    console.log('ph' + phValues);
                                } else if (item.sensor_id === 2) {
                                    ecValues.push(item.value);
                                    console.log('ec' + ecValues);
                                }
                            });
                            // Kiểm tra xem các mảng không rỗng
                            if (phValues.length === 0 && ecValues.length === 0) {
                                console.error("No pH or EC values available.");
                                return; // Không có dữ liệu để vẽ biểu đồ
                            }
                            // Khởi tạo biểu đồ
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'line'
                                },
                                title: {
                                    text: 'Thống kê độ pH và độ EC',
                                    align: 'left',
                                },
                                yAxis: {
                                    title: {
                                        text: 'Giá trị',
                                    },
                                },
                                xAxis: {
                                    categories: time,
                                    title: {
                                        text: 'Thời gian'
                                    }
                                },
                                series: [{
                                    name: 'Độ pH',
                                    data: phValues,
                                }, {
                                    name: 'Độ EC',
                                    data: ecValues,
                                }],
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 200,
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom',
                                            },
                                        },
                                    }],
                                },
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: ", error);
                        }
                    });
                }
            }
        });

        //Xử lý biểu đồ PH và EC
        $(document).on('click', '.btn-update', function(event) {
            let id = $(this).data('id');
            event.preventDefault();

            station_id = id;

            $.ajax({
                url: "{{ route('admin.station.getDataSensor') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);

                    let phValues = [];
                    let ecValues = [];
                    let time = [];
                    // Lấy 5 dữ liệu gần nhất
                    let lastFiveData = data.slice(-10);

                    // Kiểm tra xem có dữ liệu hay không
                    if (lastFiveData.length === 0) {
                        console.error("No data available.");
                        return; // Không có dữ liệu
                    }

                    lastFiveData.forEach(item => {
                        const date = new Date(item.created_at);
                        const hours = date.getHours().toString().padStart(2, '0');
                        const minutes = date.getMinutes().toString().padStart(2, '0');
                        time.push(`${hours}:${minutes}`);

                        if (item.sensor_id === 1) {
                            phValues.push(item.value);
                            console.log('ph' + phValues);
                        } else if (item.sensor_id === 2) {
                            ecValues.push(item.value);
                            console.log('ec' + ecValues);
                        }
                    });

                    // Kiểm tra xem các mảng không rỗng
                    if (phValues.length === 0 && ecValues.length === 0) {
                        console.error("No pH or EC values available.");
                        return; // Không có dữ liệu để vẽ biểu đồ
                    }

                    // Khởi tạo biểu đồ
                    Highcharts.chart('container', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Thống kê độ pH và độ EC',
                            align: 'left',
                        },
                        yAxis: {
                            title: {
                                text: 'Giá trị',
                            },
                        },
                        xAxis: {
                            categories: time,
                            title: {
                                text: 'Thời gian'
                            }
                        },
                        series: [{
                            name: 'Độ pH',
                            data: phValues,
                        }, {
                            name: 'Độ EC',
                            data: ecValues,
                        }],
                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 200,
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom',
                                    },
                                },
                            }],
                        },
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", error);
                }
            });

            $('#modal-update').modal('show');
        });

        $(document).on('click', '.btn-update', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $('#update-id').val(id);
            $('#update-name').val(name);

            $('#modal-update').modal('show');
        });

        var pusher = new Pusher("618d23d7e8c8fbe0ccfb", {
            cluster: "ap1",
        });
        var channel = pusher.subscribe("status-channel");
        channel.bind("update-status", function(res) {
            console.log('status station : ' + res.text);
            if ($(document).find('#modal-update').hasClass('show')) {
                var scrollPositison = $(document).find('#modal-update').scrollTop();

                if (res.text == 'status') {
                    $(document).find('#modal-update').scrollTop(scrollPositison);
                    $.ajax({
                        url: "{{ route('admin.station.getdata') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: btn_status,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            $('#sensor_table tbody').empty();
                            data.forEach(function(item, index) {
                                console.log(item);
                                var checkboxId = 'customSwitch' +
                                    index;
                                var checkboxName = 'status[' + item.id +
                                    ']';

                                var isChecked = item.status === 1 ? 'checked' : '';

                                $('#sensor_table tbody').append(
                                    '<tr>' +
                                    '<td>' + item.id + '</td>' +
                                    '<td>' + item.name + '</td>' +
                                    '<td><img src="' + item.image +
                                    '" alt="sensor-img" class="rounded" height="60" /></td>' +
                                    '<td>' + item.pin + '</td>' +
                                    '<td>' +
                                    '<div class="form-check form-switch mb-3">' +
                                    // Hidden input với giá trị mặc định là 0, sẽ gửi nếu checkbox không được tích
                                    '<input type="hidden" name="' + checkboxName +
                                    '" value="0">' +
                                    // Checkbox, nếu được tích thì sẽ gửi giá trị 1
                                    '<input class="form-check-input" type="checkbox" id="' +
                                    checkboxId +
                                    '" name="' + checkboxName + '" value="1" ' +
                                    isChecked + '>' +
                                    '<label class="form-check-label" for="' +
                                    checkboxId +
                                    '">Mở</label>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                                );
                            });
                        },
                        error: function(data) {},
                    });
                }
            }
        });

        $(document).on('click', '.btn-update', function(event) {
            let id = $(this).data('id');
            console.log('station id :' + id);
            event.preventDefault();


            btn_status = id;
            $.ajax({
                url: "{{ route('admin.station.getdata') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#sensor_table tbody').empty();
                    data.forEach(function(item, index) {
                        console.log(item);
                        var checkboxId = 'customSwitch' +
                            index;
                        var checkboxName = 'status[' + item.id +
                            ']';

                        var isChecked = item.status === 1 ? 'checked' : '';

                        $('#sensor_table tbody').append(
                            '<tr>' +
                            '<td>' + item.id + '</td>' +
                            '<td>' + item.name + '</td>' +
                            '<td><img src="' + item.image +
                            '" alt="sensor-img" class="rounded" height="60" /></td>' +
                            '<td>' + item.pin + '</td>' +
                            '<td>' +
                            '<div class="form-check form-switch mb-3">' +
                            // Hidden input với giá trị mặc định là 0, sẽ gửi nếu checkbox không được tích
                            '<input type="hidden" name="' + checkboxName +
                            '" value="0">' +
                            // Checkbox, nếu được tích thì sẽ gửi giá trị 1
                            '<input class="form-check-input" type="checkbox" id="' +
                            checkboxId +
                            '" name="' + checkboxName + '" value="1" ' +
                            isChecked + '>' +
                            '<label class="form-check-label" for="' +
                            checkboxId +
                            '">Mở</label>' +
                            '</div>' +
                            '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function(data) {},
            });
        });

        // Update trạng thái station
        $(document).on('click', '.form-check-input', function(event) {
            let form = $(this).parents('form');
            let data = form.serialize();

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {

                },
            });
        });

        // Khởi tạo datatable
        let table = $('#table').DataTable({
            responsive: true,
            ajax: {
                url: `{{ route('admin.station.getList') }}`,
            },
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true
                },
                {
                    data: 'customer_id',
                    name: 'customer_id',
                    orderable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true
                },
                // {
                //     data: 'setup_date',
                //     name: 'setup_date',
                //     orderable: true
                // },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            pageLength: $('#_pageLength').val(),
            // language: datatableConfigLanguage,
        });
    </script>
@endsection
