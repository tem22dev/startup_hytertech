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
                                <li class="breadcrumb-item active">Phân loại giàn</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Phân loại giàn</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-create">
                                        <i class="mdi mdi-plus-circle me-2"></i> Thêm loại giàn
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Tiêu đề</th>
                                            <th>Hình ảnh</th>
                                            <th>Số giàn</th>
                                            <th>Thời gian</th>
                                            <th style="width: 80px;">Hành động</th>
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
    <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm loại giàn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">
                                Tiêu đề
                                <span class="badge badge-danger-lighten">Yêu cầu</span>
                            </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tiêu đề">
                            <div class="invalid-feedback error-name"></div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="image">
                                Hình ảnh
                                <span class="badge badge-danger-lighten">Yêu cầu</span>
                            </label>
                            <div class="overflow-hidden">
                                <input
                                    class="form-control"
                                    type="file"
                                    id="image"
                                    name="image"
                                >
                                <div class="invalid-feedback error-image"></div>
                            </div>
                        </div>
                        <div id="row-preview" class="row d-flex align-items-center">
                            <div class="col-md-12">
                                <img 
                                    src=""
                                    id="preview-station"
                                    class="rounded"
                                    height="340"
                                    alt="" 
                                />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Cập nhật loại giàn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update">
                        @csrf
                        <input type="hidden" name="id" id="id_update">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="col-form-label" for="name">
                                        Tiêu đề
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <input type="text" class="form-control" id="name-update"
                                        name="name">
                                    <div class="invalid-feedback error-name"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label" for="image">
                                        Hình ảnh
                                        <span class="badge badge-danger-lighten">Yêu cầu</span>
                                    </label>
                                    <div class="overflow-hidden">
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="image-update"
                                            name="image"
                                        >
                                        <div class="invalid-feedback error-image"></div>
                                    </div>
                                </div>
                                <div id="row-preview-update" class="row d-flex align-items-center">
                                    <div class="col-md-12">
                                        <img 
                                            src=""
                                            id="preview-station-update"
                                            class="rounded"
                                            height="340"
                                            alt="" 
                                        />
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
    {{-- Model delete --}}
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="model-delete-label" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <form id="form-delete">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-content">
                    <div class="modal-header text-bg-danger">
                        <h5 class="modal-title" id="model-delete-label">Xác nhận xoá đơn vị đo</h5>
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
                url: `{{ route('admin.categoryStation.getList') }}`,
            },
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'products_count',
                    name: 'products_count',
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

        // Select file image create
        $('#image').change(function(e) {
            let file = e.target.files[0];
            let previewURL = URL.createObjectURL(file);
            
            $('#preview-station').attr('src', previewURL);
        });
        // Store
        $('#submit-store').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-create')[0]);

            $.ajax({
                type: "post",
                url: `{{ route('admin.categoryStation.store') }}`,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#modal-create .invalid-feedback").text('');
                    _this.prop('disabled', true);
                },
                success: function(result) {
                    _this.prop('disabled', false);
                    $('#modal-create').modal('hide');
                    $('#form-create')[0].reset();
                    $('#form-create').find('#preview-station').attr('src', '');
                    table.ajax.reload();

                    showNotification("Thành công", "Bạn đã thêm thành công", "top-right", "rgba(0,0,0,0.2)","success");
                },
                error: function(jqXHR, status, error) {
                    _this.prop('disabled', false);

                    if (jqXHR.status === 422) {
                        let err = jqXHR.responseJSON.errors;
                        for (index in err) {
                            $(`div[class="invalid-feedback error-${index}"]`).addClass('d-block').html(err[index]);
                        }
                    }
                }
            });
        });

        // Select file image update
        $('#image-update').change(function(e) {
            let file = e.target.files[0];
            let previewURL = URL.createObjectURL(file);
            
            $('#preview-station-update').attr('src', previewURL);
        });
        // Show data update
        $('#modal-update').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let categoryId = button.data('id');
            let url = '{{ route('admin.categoryStation.getData') }}' + '?id=' + categoryId;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    let categoryData = response.data[0];
                    console.log(categoryData);
                    
                    
                    $('#name-update').val(categoryData.name);
                    $('#preview-station-update').attr('src', categoryData.image);
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
                url: `{{ route('admin.categoryStation.update') }}`,
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
                    $('#form-update').find('#preview-station-update').attr('src', '');
                    table.ajax.reload();

                    showNotification("Thành công", "Bạn đã cập nhật thành công", "top-right", "rgba(0,0,0,0.2)","success");
                },
                error: function(jqXHR, status, error) {
                    _this.prop('disabled', false);

                    if (jqXHR.status === 422) {
                        let err = jqXHR.responseJSON.errors;
                        for (index in err) {
                            $(`div[class="invalid-feedback error-${index}"]`).addClass('d-block').html(err[index]);
                        }
                    }
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
            let routeDelete = `{{ route('admin.categoryStation.delete') }}`
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