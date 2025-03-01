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
                                <li class="breadcrumb-item active">Danh sách đơn vị đo</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Danh sách đơn vị đo</h4>
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
                                        <i class="mdi mdi-plus-circle me-2"></i> Thêm đơn vị đo
                                    </button>
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                        <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                        <button type="button" class="btn btn-light mb-2">Export</button>
                                    </div>
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
                                            <th>Tên đơn vị</th>
                                            <th>Biểu tượng</th>
                                            <th>Mô tả</th>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm đơn vị đo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Tên đơn vị đo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên đơn vị đo">
                            <div class="invalid-feedback error-name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="col-form-label">Biểu tượng</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Biểu tượng đơn vị đo">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Mô tả đơn vị đo"></textarea>
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
    <div class="modal fade" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cập nhật đơn vị đo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update">
                        @csrf
                        <input type="hidden" name="id" id="id_update">
                        <div class="mb-3">
                            <label for="name_update" class="col-form-label">Tên đơn vị đo</label>
                            <input type="text" class="form-control" id="name_update" name="name" placeholder="Tên đơn vị đo">
                            <div class="invalid-feedback error-name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="icon_update" class="col-form-label">Biểu tượng</label>
                            <input type="text" class="form-control" id="icon_update" name="icon" placeholder="Biểu tượng">
                        </div>
                        <div class="mb-3">
                            <label for="description_update" class="col-form-label">Mô tả</label>
                            <textarea class="form-control" id="description_update" name="description" placeholder="Mô tả đơn vị đo"></textarea>
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
                url: `{{ route('admin.measure.getList') }}`,
            },
            columns: [
                {
                    data: 'selected',
                    name: 'selected',
                    orderable: false,
                    render: function() {
                        return `
                            <td>
                                <div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='customCheck2'>
                                    <label class='form-check-label' for='customCheck2'>&nbsp;</label>
                                </div>
                            </td>
                        `;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    render: function (data) {
                        return `
                            <span class='text-body fw-semibold'>
                                ${data}
                            </span>
                        `;
                    }
                },
                {
                    data: 'icon',
                    name: 'icon',
                    orderable: true,
                    render: function (data) {
                        return `${data ? `<span class='fw-semibold badge bg-info'>${data}</span>` : '' } `;
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
                    orderable: false,
                    render: function (data) {
                        return `
                            <a data-id='${data}'
                               href='javascript:void(0);'
                               class='action-icon btn-update'
                               data-bs-toggle='modal'
                               data-bs-target='#modal-update'>
                               <i class='mdi mdi-square-edit-outline'></i>
                           </a>
                           <a data-id='${data}'
                               href='javascript:void(0);'
                               class='action-icon btn-delete'
                               data-bs-toggle='modal'
                               data-bs-target='#modal-delete'>
                               <i class='mdi mdi-delete'></i>
                           </a>
                        `;
                    }
                },
            ],
            pageLength: $('#_pageLength').val(),
            //language: datatableConfigLanguage,
        });

        // Store
        $('#submit-store').click(function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-create')[0]);

            $.ajax({
                type: "post",
                url: `{{ route('admin.measure.store') }}`,
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

        // Show data
        $('#modal-update').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let measureId = button.data('id');

            let url = '{{ route('admin.measure.getData') }}' + '?id=' + measureId;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    let measureData = response.data[0];
                    
                    $('#name_update').val(measureData.name);
                    $('#icon_update').val(measureData.icon);
                    $('#description_update').val(measureData.description);
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
                url: `{{ route('admin.measure.update') }}`,
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
            let routeDelete = `{{ route('admin.measure.delete') }}`
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