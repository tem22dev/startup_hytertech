<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{ env('APP_URL') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/systems/logo-dark.png') }}" alt="Hytertech" style="height: 28px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/systems/logo-sm.png') }}" alt="Hytertech" style="height:30px;width:30px">
        </span>
    </a>
    <!-- Brand Logo Dark -->
    <a href="{{ env('APP_URL') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/systems/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/systems/logo-dark-sm.png') }}" alt="small logo">
        </span>
    </a>
    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>
    <!-- Sidebar -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="">
                <img src="{{ asset('assets/systems/avatar-default.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="fad fa-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Quản lý</li>
            <li class="side-nav-item">
                <a href="{{ route('admin.measure') }}" class="side-nav-link">
                    <i class="far fa-temperature-up"></i>
                    <span> Đơn vị đo </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.sensor') }}" class="side-nav-link">
                    <i class="fal fa-sensor"></i>
                    <span> Cảm biến </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarStation" aria-expanded="false" aria-controls="sidebarStation" class="side-nav-link">
                    <i class="far fa-house-signal"></i>
                    <span> Giàn thuỷ canh </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarStation">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.categoryStation') }}">Phân loại</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.station') }}">Danh sách</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.maintenance') }}" class="side-nav-link">
                    <i class="fal fa-tools"></i>
                    <span> Bảo trì </span>
                </a>
            </li>

            <li class="side-nav-title">Tài khoản</li>
            <li class="side-nav-item">
                <a href="{{ route('admin.account') }}" class="side-nav-link">
                    <i class="far fa-user-crown"></i>
                    <span> Quản trị viên </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.customer') }}" class="side-nav-link">
                    <i class="far fa-users-medical"></i>
                    <span> Khách hàng </span>
                </a>
            </li>
        </ul>
        <!--- End Sidemenu -->
        <div class="clearfix"></div>
    </div>
</div>