<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{Request::segment(2) ==='dashboard' ? 'active' : ''}}"><a href="{!! URL::to('admin/dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Basic Information</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{(Request::segment(2) ==='bank-dtl') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/bank-dtl') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Company Banks</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='bank-list') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/bank-list') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>All Bank</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='employee-dtl') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/employee-dtl') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Employee Detail</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='emp-department') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/emp-department') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Employee Department</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='currency') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/currency') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Currency</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='product-category' && empty(Request::segment(3))) ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/product-category') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Product Category</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='product-type' && empty(Request::segment(3))) ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/product-type') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Product Type</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='product-unit' && empty(Request::segment(3))) ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/product-unit') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Product Unit</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='state-list' && empty(Request::segment(3))) ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/state-list') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>State List</span>
                                </a>
                            </li>
                            <li class="nav-item {{(Request::segment(2) ==='financial-year') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/financial-year') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Financial Year</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
