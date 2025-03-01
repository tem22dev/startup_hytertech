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
                            </ol>
                        </div>
                        <h4 class="page-title">Thông tin bảo trì</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="{{ asset("/admin/maintenance/add") }}" class="btn btn-danger mb-2">
                                        <i class="fal fa-plus-circle"></i> 
                                        Thêm thông tin mới
                                    </a>
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-success mb-2 me-1">
                                            <i class="fal fa-cog"></i>
                                        </button>
                                        <button type="button" class="btn btn-light mb-2 me-1">Xuất</button>
                                        <button type="button" class="btn btn-light mb-2">Nhập</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 25px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all text-center" style="width: 30px;">Giàn</th>
                                            <th class="all text-center">Thời gian bảo trì</th>
                                            <th class="all text-center">Nội dung</th>
                                            <th class="text-center" style="width: 200px;">Thao tác</th>
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
                                                <a href="{{ asset("/admin/station/1") }}">
                                                    L1 - 0001
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                01/07/2024
                                            </td>
                                            <td class="text-center">
                                                Nội dung bảo trì...
                                            </td>
                                            <td class="table-action text-center d-flex justify-content-evenly align-items-center">
                                                <a href="{{ asset("/admin/maintenance/1") }}" class="action-icon">
                                                    <i class="fal fa-edit"></i>
                                                </a>
                                                <a href="{{ asset("/admin/maintenance/1") }}" class="action-icon">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ asset("/admin/station/2") }}">
                                                    L2 - 0001
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                01/07/2024
                                            </td>
                                            <td class="text-center">
                                                Nội dung bảo trì...
                                            </td>
                                            <td class="table-action text-center d-flex justify-content-evenly align-items-center">
                                                <a href="{{ asset("/admin/maintenance/1") }}" class="action-icon">
                                                    <i class="fal fa-edit"></i>
                                                </a>
                                                <a href="{{ asset("/admin/maintenance/1") }}" class="action-icon">
                                                    <i class="fal fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ asset("/admin/station/3") }}">
                                                    L3 - 0001
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                01/07/2024
                                            </td>
                                            <td class="text-center">
                                                Nội dung bảo trì...
                                            </td>
                                            <td class="table-action text-center d-flex justify-content-evenly align-items-center">
                                                <a href="{{ asset("/admin/maintenance/1") }}" class="action-icon">
                                                    <i class="fal fa-edit"></i>
                                                </a>
                                                <a href="{{ asset("/admin/maintenance/1") }}" class="action-icon">
                                                    <i class="fal fa-trash"></i>
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
            //language: datatableConfigLanguage,
        });
    </script>
@endsection