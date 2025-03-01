@use('App\Enums\SensorEnum')
@use('App\Enums\SensorStringEnum')
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
                                <li class="breadcrumb-item active">Danh sách cảm biến</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Danh sách cảm biến</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                        data-bs-target="#modal-create">
                                        <i class="mdi mdi-plus-circle me-2"></i> Thêm cảm biến
                                    </button>
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
                                            <th class="all">Loại cảm biến</th>
                                            <th>Mô tả</th>
                                            <th>Thời gian</th>
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
    {{-- Model add --}}
    <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm cảm biến</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-create">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="name">
                                        Số hiệu
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name="name">
                                        <div class="invalid-feedback error-name"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="type">
                                        Loại
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-select" id="type" name="type">
                                            <option value="" hidden>Chọn loại cảm biến</option>
                                            @foreach (SensorEnum::getValues() as $index => $value)
                                                <option value={{ $index }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback error-type"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="description">
                                        Mô tả
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="">
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex align-items-center">
                                    <label class="col-md-4 col-form-label" for="image">
                                        Hình ảnh
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="col-md-8 overflow-hidden">
                                        <input class="form-control" type="file" id="image" name="image">
                                        <div class="invalid-feedback error-image"></div>
                                    </div>
                                </div>
                                <div id="row-preview" class="row d-flex align-items-center">
                                    <label class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <img src="" id="preview-sensor" class="rounded" height="140"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button id="submit-store" class="btn btn-primary">
                        <i class="mdi mdi-plus-circle me-2"></i> Thêm
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Model update --}}
    <div class="modal fade" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cập nhật cảm biến</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update">
                        @csrf
                        <input type="hidden" name="id" id="id_update">
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="name">
                                        Số hiệu
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name-update" name="name">
                                        <div class="invalid-feedback error-name"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="type">
                                        Loại
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-select" id="type-update" name="type">
                                            <option value="" hidden>Chọn loại cảm biến</option>
                                            @foreach (SensorEnum::getValues() as $index => $value)
                                                <option value={{ $index }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback error-type"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="description">
                                        Mô tả
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="description-update"
                                            name="description" value="">
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex align-items-center">
                                    <label class="col-md-4 col-form-label" for="image">
                                        Hình ảnh
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="col-md-8 overflow-hidden">
                                        <input class="form-control" type="file" id="image-update" name="image">
                                        <div class="invalid-feedback error-image"></div>
                                    </div>
                                </div>
                                <div id="row-preview-update" class="row d-flex align-items-center">
                                    <label class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <img src="" id="preview-sensor-update" class="rounded" height="140"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                    <button type="button" id="submit-update" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i> Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Model setting --}}
    <div class="modal fade" id="modal-setting" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm đơn vị đo cho cảm biến</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-setting">
                        @csrf
                        <input type="hidden" name="id" id="setting">
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label" for="name">
                                        Đơn vị đo
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control select2" data-toggle="select2" multiple="multiple"
                                            id="measure_id" name="measure_id[]" required>
                                            <option></option>
                                            @foreach ($listMeasure as $measure)
                                                <option value={{ $measure->id }}>{{ $measure->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button id="submit-setting" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i> Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Model delete --}}
    <div class="modal fade" id="modal-delete" aria-labelledby="model-delete-label" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <form id="form-delete">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-content">
                    <div class="modal-header text-bg-danger">
                        <h5 class="modal-title" id="model-delete-label">Xác nhận xoá cảm biến</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Nội dung sẽ bị xóa vĩnh viễn, bạn có chắc ?
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">Huỷ</a>
                        <button type="button" class="btn btn-danger" id="submit-delete">Xoá</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Init table
        let table = $('#table').DataTable({
            responsive: true,
            ajax: {
                url: `{{ route('admin.sensor.getList') }}`,
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
                    data: 'type',
                    name: 'type',
                    orderable: true,
                    render: function(data) {
                        return `
                            <span class='badge bg-info p-1'>
                                ${data == 1 ? 'Điều khiển động cơ' : 'Máy đo' }
                            </span>
                        `;
                    }
                },
                {
                    data: 'description',
                    name: 'description',
                    orderable: true
                },
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
            //language: datatableConfigLanguage,
        });

        // Init select2 modal setting
        $('#modal-setting').on('show.bs.modal', function() {
            $('#measure_id').select2({
                placeholder: "Chọn đơn vị đo",
                dropdownParent: $('#modal-setting')
            });
        });

        // Model hide
        $('#modal-update, #modal-create, #modal-setting').on('hide.bs.modal', function(event) {
            $('#form-update')[0].reset();
            $("#modal-update .invalid-feedback").text('');
            $('#form-update').find('#preview-sensor-update').attr('src', '');

            $('#form-create')[0].reset();
            $("#modal-create .invalid-feedback").text('');
            $('#form-create').find('#preview-sensor').attr('src', '');

            $('#form-setting')[0].reset();
            $("#modal-setting .invalid-feedback").text('');
        });

        // Select file image create
        $('#image').change(function(e) {
            let file = e.target.files[0];
            let previewURL = URL.createObjectURL(file);

            $('#preview-sensor').attr('src', previewURL);
        });

        // Select file image update
        $('#image-update').change(function(e) {
            let file = e.target.files[0];
            let previewURL = URL.createObjectURL(file);

            $('#preview-sensor-update').attr('src', previewURL);
        });

        // Store
        $('#submit-store').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-create')[0]);

            $.ajax({
                type: "post",
                url: `{{ route('admin.sensor.store') }}`,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#modal-create .invalid-feedback").text('');
                    $('#form-create .invalid-feedback').removeClass('d-block');

                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#modal-create').modal('hide');
                    $('#form-create')[0].reset();
                    $('#form-create').find('#preview-sensor').attr('src', '');
                    table.ajax.reload();

                    showNotification("Thành công", "Bạn đã thêm thành công", "top-right",
                        "rgba(0,0,0,0.2)", "success");
                },
                error: function(jqXHR, status, error) {
                    _this.prop('disabled', false);

                    if (jqXHR.status === 422) {
                        let err = jqXHR.responseJSON.errors;
                        let firstTab = null;

                        for (index in err) {
                            let errorElement = $(`div[class="invalid-feedback error-${index}"]`);
                            $(`div[class="invalid-feedback error-${index}"]`).addClass('d-block').html(
                                err[index]);

                            let tabId = errorElement.closest('.tab-pane').attr('id');
                            if (!firstTab && tabId) {
                                firstTab = tabId;
                            }
                        }
                        if (firstTab) {
                            $('#basicwizard a[href="#' + firstTab + '"]').tab('show');
                        }
                    }
                }
            });
        });

        // Show data update
        $('#modal-update').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let sensorId = button.data('id');
            let url = '{{ route('admin.sensor.getData') }}' + '?id=' + sensorId;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    let sensorData = response.data;
                    let listType = @json(\App\Enums\SensorEnum::getValues());

                    $('#name-update').val(sensorData.name);
                    $('#description-update').val(sensorData.description);
                    $('#preview-sensor-update').attr('src', sensorData.image);

                    if (Object.keys(listType).includes(sensorData.type)) {
                        $('#type-update').val(sensorData.type);
                    }
                },
                error: function(status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        });
        // Update
        $('body').on('click', '.btn-update', function() {
            let _this = $(this);
            $('#id_update').val(_this.attr('data-id'));
        });

        $('#submit-update').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-update')[0]);
            $.ajax({
                type: "POST",
                url: `{{ route('admin.sensor.update') }}`,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#modal-update .invalid-feedback").text('');
                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#modal-update').modal('hide');
                    $('#modal-update').find('form')[0].reset();
                    $('#form-update').find('#preview-sensor-update').attr('src', '');
                    table.ajax.reload();

                    showNotification("Thành công", "Bạn đã cập nhật thành công", "top-right",
                        "rgba(0,0,0,0.2)", "success");
                },
                error: function(jqXHR, status, error) {
                    _this.prop('disabled', false);

                    if (jqXHR.status === 422) {
                        let err = jqXHR.responseJSON.errors;
                        for (index in err) {
                            $(`div[class="invalid-feedback error-${index}"]`).addClass('d-block').html(
                                err[index]);
                        }
                    }
                }
            });
        });

        // Show data measurement quantities
        $('#modal-setting').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let sensorId = button.data('id');
            let url = '{{ route('admin.measurement.getData') }}' + '?id=' + sensorId;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    let sensorData = response.data;
                    console.log(sensorData);

                    let selectedMeasures = sensorData.measurement_quantities.map(function(mq) {
                        return mq.measure_id;
                    });

                    $('#measure_id').val(selectedMeasures).trigger('change');
                },
                error: function(status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        });

        // Submit setting
        $('body').on('click', '.btn-setting', function() {
            let _this = $(this);
            $('#setting').val(_this.attr('data-id'));
        });
        $('#submit-setting').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-setting')[0]);

            $.ajax({
                type: "POST",
                url: `{{ route('admin.measurement.update') }}`,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#modal-setting').modal('hide');
                    $('#form-setting')[0].reset();
                    showNotification("Thành công", "Bạn đã cập nhật thành công", "top-right",
                        "rgba(0,0,0,0.2)", "success");
                },
                error: function(jqXHR, status, error) {
                    _this.prop('disabled', false);
                    console.error('AJAX Error: ' + status + error);
                }
            });
        });

        // Delete
        $('body').on('click', '.btn-delete', function() {
            $('#modal-delete').find('input[name="id"]').val($(this).attr('data-id'));
        })
        $('#submit-delete').on('click', function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-delete')[0]);
            let routeDelete = `{{ route('admin.sensor.delete') }}`
            $.ajax({
                type: 'POST',
                url: routeDelete,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#modal-delete').modal('hide');
                    $('#modal-delete').find('form')[0].reset();
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    _this.prop('disabled', false);
                }
            })
        })
    </script>
@endsection
