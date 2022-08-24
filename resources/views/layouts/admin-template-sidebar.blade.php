<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>

                    <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}"><a
                            href="{!! URL::to('admin/dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Basic
                                Information</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'bank-dtl' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/bank-dtl') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Company Banks</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'bank-list' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/bank-list') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>All Bank</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'employee-dtl' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/employee-dtl') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Employee Detail</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'emp-department' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/emp-department') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Employee Department</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'currency' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/currency') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Currency</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'product-category' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/product-category') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Product Category</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'product-type' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/product-type') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Product Type</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'product-unit' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/product-unit') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Product Unit</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'state-list' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/state-list') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>State List</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item {{(Request::segment(2) ==='financial-year') ? 'active' : ''}}">
                                <a href="{!! URL::to('admin/financial-year') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Financial Year</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>

                    {{-- new add --}}
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>ADD</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>BRANCH</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>CATEGORY</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PRICE LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>UPDATE OP STOCK</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>VENDOR</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>CUSTOMER</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>EMPLOYEE</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>DELIVERY STATUS</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>LEDGER</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>USER</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>E-TABLE</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- new purchase --}}
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i>
                            <span>PURCHASE</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PURCHASE ORDER</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PURCHASE ORDER SUMMARY</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PURCHASE ORDER LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PURCHASE DCHALLAN LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PURCHASE INVOICE LIST</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>DEBITNOTE LIST</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>LINK LIST</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- new supply --}}
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>SUPPLY</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>SHALES ORDERD SUMMARY</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>SHALES ORDERD DETAILS</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>TAX INVOICE LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>EXPORT LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>LIASO</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PROVISIONAL LIASO LIST</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>(INR)LIASO TAXINV LIST</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>(FC)LIASO TAXINV LIST</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>INTERNALCHALLAN</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>DCHALLAN LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>CREDITNOTE LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>DEBITNOTE</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PBG</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PBG LIST</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- new payment --}}
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i>
                            <span>PAYMENT</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PAYMENT</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>RECEIVE</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- new quotation --}}
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i>
                            <span>QUOTATION</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>ENQUIRY</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>SALES LEAD</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>ADD QUOTATION</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>QUOTATION LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>ADD TENDER</span>
                                </a>
                            </li>
                            <li
                                class="nav-item {{ Request::segment(2) === 'coming-soon' && empty(Request::segment(3)) ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>EMD STATEMENT</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i>
                            <span>ACCOUNTS</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>VOUCHER</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>VOUCHER LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>JOURNAL</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>JOURNAL LIST</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>TRIAL BALANCE </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>LEDGER STATEMENT</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>PARTY LEDGER </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>BRAND SALES</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>BRAND PURCHASE </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>CASH BOOK</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>BANK BOOK </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>ADD BANK </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>CONTRA</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>REPORT</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>CITY</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>Soon</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    @isset($allFy)
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">
                                <i class="icon-color-sampler"></i>
                                <span>
                                    FINANCIAL YEAR
                                </span>
                            </a>
                            <ul class="nav nav-group-sub" data-submenu-title="Pages">
                                @foreach ($allFy as $id => $fy)
                                    <li class="nav-item {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}"> {{-- today --}}
                                        <a class="nav-link"
                                            href="{{ url('/admin/financial-year/set-financial-year/' . $id) }}">{{ $fy }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endisset

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i>
                            <span>SETTING</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">

                            <li class="nav-item {{ Request::segment(2) === 'coming-soon' ? 'active' : '' }}">
                                <a href="{!! URL::to('admin/coming-soon') !!}" class="nav-link">
                                    <i class="icon-newspaper2"></i><span>ADD COMPANY</span>
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
{{-- footer script start--}}
{{-- footer script end--}}
