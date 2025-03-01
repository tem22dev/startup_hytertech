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
                                    <a href="{{ asset('/admin/station') }}" class="action-icon">
                                        Giàn
                                    </a>
                                </li>
                                <li><i class="mx-2 fas fa-chevron-right"></i></li>
                                <li class="breadcrumb-item">
                                    <a href="{{ asset('/admin/station/add') }}" class="action-icon">
                                        [Tên giàn]
                                    </a>
                                </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cập nhật thông tin giàn [tên giàn]</h4>
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly align-items-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Thông tin</h4>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Số hiệu giàn</label>
                                                <input type="text" id="simpleinput" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Loại</label>
                                                <select
                                                    class="form-control select2 select2-hidden-accessible"
                                                    data-toggle="select2"
                                                    data-select2-id="select2-data-1-t3ui" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-3-efi6">Select
                                                    </option>
                                                    <option value="1" data-select2-id="station-1">
                                                        Cơ bản
                                                    </option>
                                                    <option value="2" data-select2-id="station-2">
                                                        Nâng cao
                                                    </option>
                                                    <option value="3" data-select2-id="station-3">
                                                        Cao cấp
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Chủ sở hữu</label>
                                                <select
                                                    class="form-control select2 select2-hidden-accessible"
                                                    data-toggle="select2"
                                                    data-select2-id="select2-data-1-t3ui" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option data-select2-id="select2-data-3-efi6">Select
                                                    </option>
                                                    <option value="1" data-select2-id="station-1">
                                                        Nguyễn ChunEm
                                                    </option>
                                                    <option value="2" data-select2-id="station-2">
                                                        Đặng Nguyễn Tiền Hậu
                                                    </option>
                                                    <option value="3" data-select2-id="station-3">
                                                        Nguyễn Minh Triết đẹp troai
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Chọn cảm biến lắp đặt</label>
    
                                                <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                    <optgroup label="Nhiệt độ">
                                                        <option value="T-0001">T - 0001</option>
                                                        <option value="T-0002">T - 0002</option>
                                                        <option value="T-0003">T - 0003</option>
                                                    </optgroup>
                                                    <optgroup label="Nồng độ pH">
                                                        <option value="P-0001">P - 0001</option>
                                                        <option value="P-0002">P - 0002</option>
                                                        <option value="P-0003">P - 0003</option>
                                                    </optgroup>
                                                    <optgroup label="Chất dinh dưỡng (EC)">
                                                        <option value="E-0001">E - 0001</option>
                                                        <option value="E-0002">E - 0002</option>
                                                        <option value="E-0003">E - 0003</option>
                                                    </optgroup>
                                                    <optgroup label="Quang trở">
                                                        <option value="Q-0001">Q - 0001</option>
                                                        <option value="Q-0002">Q - 0002</option>
                                                        <option value="Q-0003">Q - 0003</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="col-md-3 col-form-label" for="userName">
                                                Hình ảnh
                                            </label>
                                            <div class="col-md-9 overflow-hidden">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-sm-12 text-end pt-3">
                                            <button type="button" class="btn btn-info" style="min-width: 100px">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
