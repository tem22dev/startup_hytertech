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
                                <li class="breadcrumb-item active">Danh sách khách hàng</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Danh sách khách hàng</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="{{ route('admin.customer.add') }}" class="btn btn-danger mb-2">
                                        <i class="mdi mdi-plus-circle me-2"></i> Thêm khách hàng
                                    </a>
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
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Trạng thái</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ</th>
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
    {{-- Model delete --}}
    <div class="modal fade" id="model-delete" tabindex="-1" aria-labelledby="model-delete-label" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <form id="form-delete">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-content">
                    <div class="modal-header text-bg-danger">
                        <h5 class="modal-title" id="model-delete-label">Xác nhận xoá tài khoản</h5>
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
                url: `{{ route('admin.customer.getList') }}`,
            },
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false
                },
                {
                    data: 'full_name',
                    name: 'full_name',
                    orderable: true
                },
                {
                    data: 'tel',
                    name: 'tel',
                    orderable: true
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true
                },
                {
                    data: 'gender',
                    name: 'gender',
                    orderable: true
                },
                {
                    data: 'address',
                    name: 'address',
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

        // Delete
        $('body').on('click', '.btn-delete', function() {
            $('#model-delete').find('input[name="id"]').val($(this).attr('data-id'));
        })
        $('#submit-delete').on('click', function(e) {
            e.preventDefault();
            let _this = $(this);
            let formData = new FormData($('#form-delete')[0]);
            let routeDelete = `{{ route('admin.customer.delete') }}`
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
                    $('#model-delete').modal('hide');
                    $('#model-delete').find('form')[0].reset();
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    _this.prop('disabled', false);
                }
            })
        })

        // Update status
        $('body').on('change', '.update-status', function() {
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.customer.updateStatus') }}`,
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