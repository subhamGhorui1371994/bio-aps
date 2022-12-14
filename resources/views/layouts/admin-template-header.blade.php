<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand text-uppercase text-bold" href="{!! URL::to('admin/dashboard') !!}">
            <img src="{{ URL::asset('assets/admin/images/bio_apps_logo.png') }}" width="" class="navbar-logo-custom">
        </a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>



        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ URL::asset('assets/admin/images/user-icon.png') }}" alt="">
                    <span>{{ auth()->guard('admin')->user()->name }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    {{-- <li><a href="{!! URL::to('admin/change-password') !!}"><i class="icon-user-lock"></i> Change Password</a></li> --}}
                    <li><a href="{!! URL::to('admin/logout') !!}"><i class="icon-switch2"></i>Logout</a></li>
                </ul>
            </li>
        </ul>

        @isset($currentFy)
        <ul class="nav navbar-nav navbar-right">
            <li>
                {{-- <a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a> --}}
                <h5><span>Financial Year:</span> {{$currentFy}}</h5>
            </li>
        </ul>
        @endisset
        @isset($currentBranchName)
        <ul class="nav navbar-nav navbar-right">
            <li>
                {{-- <a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a> --}}
                <h5><span>Branch Name:</span> {{$currentBranchName}}</h5>
            </li>
        </ul>
        @endisset
    </div>
</div>
<!-- /main navbar -->
