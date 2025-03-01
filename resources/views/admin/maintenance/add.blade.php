@extends('admin.main')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ asset("/admin") }}">Hytertech</a></li>
                                <li><i class="mx-2 fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item"><a href="{{ asset("/admin/maintenance") }}">Bảo trì</a></li>
                                <li><i class="mx-2 fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item"><a href="{{ asset("/admin/maintenance/add") }}">Thêm mới</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Thêm mới</h4>
                    </div>
                </div>
            </div>
            <div class="row" data-select2-id="select2-data-11-nl8t">
                <div class="col-12" data-select2-id="select2-data-10-8nac">
                    <div class="card" data-select2-id="select2-data-9-jqz3">
                        <div class="card-body" data-select2-id="select2-data-8-9l0g">
                            <form class="row" data-select2-id="select2-data-7-7b5w">
                                <div class="col-xl-6" data-select2-id="select2-data-6-d7og">
                                    <div class="mb-3">
                                        <label for="project-overview" class="form-label">Chọn giàn được bảo trì</label>

                                        <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" data-select2-id="select2-data-1-t3ui" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-3-efi6">Select</option>
                                            <option value="1" data-select2-id="station-1">Giàn số 1</option>
                                            <option value="2" data-select2-id="station-2">Giàn số 2</option>
                                            <option value="3" data-select2-id="station-3">Giàn số 3</option>
                                            <option value="4" data-select2-id="station-4">Giàn số 4</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 position-relative" id="datepicker1">
                                        <label class="form-label">Ngày bảo trì</label>
                                        <input type="text" class="form-control" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="project-overview" class="form-label">Nội dung</label>
                                        <textarea class="form-control" id="project-overview" rows="6" placeholder="Nhập vào nội dung bảo trì"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 text-end">
                                    <button type="button" class="btn btn-info" style="min-width: 150px;">Tạo</button>
                                </div>
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