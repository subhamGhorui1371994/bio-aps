<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{Request::segment(2) ==='dashboard' ? 'active' : ''}}"><a href="{!! URL::to('admin/dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="nav-item nav-item-submenu {{Request::segment(2) ==='mandatory-disclosure' ? 'active' : ''}}">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Mandatory Disclosure</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{(Request::segment(2) ==='bank-dtl' && empty(Request::segment(3))) ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/bank-dtl') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Company Banks</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::segment(3) ==='bank-list' ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/bank-list') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>All Bank</span>
                                </a>
                            </li>
                            <li class="{{Request::segment(2) ==='contact' ? 'active' : ''}}"><a href="{!! URL::to('admin/contact') !!}"><i class="icon-newspaper2"></i> <span>contact   </span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
