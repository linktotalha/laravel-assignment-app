<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href="../"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Customer Relationship Management">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- Page Title  -->
    <title>CRM</title>
    <link rel="stylesheet" href="{{mix('css/theme.css')}}">
    <link rel="stylesheet" href="{{mix('css/toastr.css')}}">
    <link rel="stylesheet" href="{{mix('css/jquery.dataTables.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    div.dataTables_wrapper div.dataTables_length select {
        margin: 10px;
        
    }
    .dataTables_filter {
        float: right;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        width: 190px;
    }
</style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Use-Case Preview</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crm/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">CRM Panel</span><span class="nk-menu-badge">HOT</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/hotel/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                                        <span class="nk-menu-text">Hotel Management</span><span class="nk-menu-badge">HOT</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{url('categories')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">Categories</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{url('products/create')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                        <span class="nk-menu-text">Products</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index-analytics.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                        <span class="nk-menu-text">Analytics Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index-invest.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Invest Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Pre-Built Pages</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                        <span class="nk-menu-text">Projects</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">User Manage</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">User List - Compact</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Details - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Profile - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-card.html" class="nk-menu-link"><span class="nk-menu-text">User Contact - Card</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">AML / KYCs</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/kyc-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/kyc-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC Details - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/transaction-basic.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Basic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/transaction-crypto.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Crypto</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                                        <span class="nk-menu-text">Applications</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/apps-messages.html" class="nk-menu-link"><span class="nk-menu-text">Messages</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-inbox.html" class="nk-menu-link"><span class="nk-menu-text">Inbox / Mail</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-file-manager.html" class="nk-menu-link"><span class="nk-menu-text">File Manager</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-chats.html" class="nk-menu-link"><span class="nk-menu-text">Chats / Messenger</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-calendar.html" class="nk-menu-link"><span class="nk-menu-text">Calendar</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-kanban.html" class="nk-menu-link"><span class="nk-menu-text">Kanban Board</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Invoice</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/invoice-list.html" class="nk-menu-link"><span class="nk-menu-text">Invoice List</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/invoice-details.html" class="nk-menu-link"><span class="nk-menu-text">Invoice Details</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">Products</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/product-list.html" class="nk-menu-link"><span class="nk-menu-text">Product List</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/product-card.html" class="nk-menu-link"><span class="nk-menu-text">Product Card</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/product-details.html" class="nk-menu-link"><span class="nk-menu-text">Product Details</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/pricing-table.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-view-col"></em></span>
                                        <span class="nk-menu-text">Pricing Table</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/gallery.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-img"></em></span>
                                        <span class="nk-menu-text">Image Gallery</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Misc Pages</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signin"></em></span>
                                        <span class="nk-menu-text">Auth Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-login.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-register.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-reset.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-success.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Classic Version - v2</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-login-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-register-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-reset-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-success-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">No Slider Version - v3</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-login-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-register-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-reset-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-success-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Error Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/404-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Classic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/504-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Classic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/404-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Modern</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/504-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Modern</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Other Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/_blank.html" class="nk-menu-link"><span class="nk-menu-text">Blank / Startup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/faqs.html" class="nk-menu-link"><span class="nk-menu-text">Faqs / Help</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/terms-policy.html" class="nk-menu-link"><span class="nk-menu-text">Terms / Policy</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/regular-v1.html" class="nk-menu-link"><span class="nk-menu-text">Regular Page - v1</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/regular-v2.html" class="nk-menu-link"><span class="nk-menu-text">Regular Page - v2</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Components</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                        <span class="nk-menu-text">Ui Elements</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/alerts.html" class="nk-menu-link"><span class="nk-menu-text">Alerts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/accordions.html" class="nk-menu-link"><span class="nk-menu-text">Accordions</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/avatar.html" class="nk-menu-link"><span class="nk-menu-text">Avatar</span> <span class="nk-menu-badge">New</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/badges.html" class="nk-menu-link"><span class="nk-menu-text">Badges</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/buttons.html" class="nk-menu-link"><span class="nk-menu-text">Buttons</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/buttons-group.html" class="nk-menu-link"><span class="nk-menu-text">Button Group</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/breadcrumb.html" class="nk-menu-link"><span class="nk-menu-text">Breadcrumb</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/cards.html" class="nk-menu-link"><span class="nk-menu-text">Cards</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/carousel.html" class="nk-menu-link"><span class="nk-menu-text">Carousel</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/list-dropdown.html" class="nk-menu-link"><span class="nk-menu-text">List Dropdown</span><span class="nk-menu-badge">New</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/modals.html" class="nk-menu-link"><span class="nk-menu-text">Modals</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/pagination.html" class="nk-menu-link"><span class="nk-menu-text">Pagination</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/popover.html" class="nk-menu-link"><span class="nk-menu-text">Popovers</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/progress.html" class="nk-menu-link"><span class="nk-menu-text">Progress</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/spinner.html" class="nk-menu-link"><span class="nk-menu-text">Spinner</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/tabs.html" class="nk-menu-link"><span class="nk-menu-text">Tabs</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/toast.html" class="nk-menu-link"><span class="nk-menu-text">Toasts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/tooltip.html" class="nk-menu-link"><span class="nk-menu-text">Tooltip</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/typography.html" class="nk-menu-link"><span class="nk-menu-text">Typography</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Utilities</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item"><a href="html/components/elements/util-border.html" class="nk-menu-link"><span class="nk-menu-text">Border</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-colors.html" class="nk-menu-link"><span class="nk-menu-text">Colors</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-display.html" class="nk-menu-link"><span class="nk-menu-text">Display</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-embeded.html" class="nk-menu-link"><span class="nk-menu-text">Embeded</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-flex.html" class="nk-menu-link"><span class="nk-menu-text">Flex</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-text.html" class="nk-menu-link"><span class="nk-menu-text">Text</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-sizing.html" class="nk-menu-link"><span class="nk-menu-text">Sizing</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-spacing.html" class="nk-menu-link"><span class="nk-menu-text">Spacing</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/elements/util-others.html" class="nk-menu-link"><span class="nk-menu-text">Others</span></a></li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dot-box"></em></span>
                                        <span class="nk-menu-text">Crafted Icons</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/svg-icons.html" class="nk-menu-link">
                                                <span class="nk-menu-text">SVG Icon - Exclusive</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/nioicon.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Nioicon - HandCrafted</span>
                                            </a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/components/misc/icons.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-menu-circled"></em></span>
                                        <span class="nk-menu-text">Icon Libraries</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-table-view"></em></span>
                                        <span class="nk-menu-text">Tables</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/tables/table-basic.html" class="nk-menu-link"><span class="nk-menu-text">Basic Tables</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/tables/table-special.html" class="nk-menu-link"><span class="nk-menu-text">Special Tables</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/tables/table-datatable.html" class="nk-menu-link"><span class="nk-menu-text">DataTables</span> <span class="nk-menu-badge">New</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">Forms</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-elements.html" class="nk-menu-link"><span class="nk-menu-text">Form Elements</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/checkbox-radio.html" class="nk-menu-link"><span class="nk-menu-text">Checkbox Radio</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/advanced-controls.html" class="nk-menu-link"><span class="nk-menu-text">Advanced Controls</span> <span class="nk-menu-badge">New</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/input-group.html" class="nk-menu-link"><span class="nk-menu-text">Input Group</span> <span class="nk-menu-badge">New</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-upload.html" class="nk-menu-link"><span class="nk-menu-text">Form Upload</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/datetime-picker.html" class="nk-menu-link"><span class="nk-menu-text">Date &amp; Time Picker</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/number-spinner.html" class="nk-menu-link"><span class="nk-menu-text">Number Spinner</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/nouislider.html" class="nk-menu-link"><span class="nk-menu-text">noUiSlider</span> <span class="nk-menu-badge">New</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-layouts.html" class="nk-menu-link"><span class="nk-menu-text">Form Layouts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-validation.html" class="nk-menu-link"><span class="nk-menu-text">Form Validation</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-wizard.html" class="nk-menu-link"><span class="nk-menu-text">Wizard Basic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Rich Editor</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item"><a href="html/components/forms/form-summernote.html" class="nk-menu-link"><span class="nk-menu-text">Summernote</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/forms/form-quill.html" class="nk-menu-link"><span class="nk-menu-text">Quill</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/forms/form-tinymce.html" class="nk-menu-link"><span class="nk-menu-text">Tinymce</span></a></li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-pie"></em></span>
                                        <span class="nk-menu-text">Charts</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/charts/chartjs.html" class="nk-menu-link"><span class="nk-menu-text">Chart JS</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/charts/knob.html" class="nk-menu-link"><span class="nk-menu-text">Knob JS</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-puzzle"></em></span>
                                        <span class="nk-menu-text">Widgets</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/widgets/cards.html" class="nk-menu-link"><span class="nk-menu-text">Card Widgets</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/widgets/charts.html" class="nk-menu-link"><span class="nk-menu-text">Chart Widgets</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/widgets/ratings.html" class="nk-menu-link"><span class="nk-menu-text">Ratings Widgets</span><span class="nk-menu-badge">New</span></a>
                                        </li><!-- .nk-menu-item -->
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-block-over"></em></span>
                                        <span class="nk-menu-text">Miscellaneous</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/slick-sliders.html" class="nk-menu-link"><span class="nk-menu-text">Slick Slider</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/toastr.html" class="nk-menu-link"><span class="nk-menu-text">Toastr</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/sweet-alert.html" class="nk-menu-link"><span class="nk-menu-text">Sweet Alert</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/js-tree.html" class="nk-menu-link"><span class="nk-menu-text">jsTree</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/dual-listbox.html" class="nk-menu-link"><span class="nk-menu-text">Dual Listbox</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/dragula.html" class="nk-menu-link"><span class="nk-menu-text">Dragula</span><span class="nk-menu-badge">New</span></a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/map.html" class="nk-menu-link"><span class="nk-menu-text">Google Map</span><span class="nk-menu-badge">New</span></a>
                                        </li><!-- .nk-menu-item -->
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/email-templates.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>
                                        <span class="nk-menu-text">Email Template</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item" href="#">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news-text">
                                            <p>Do you know the latest update of 2022? <span> A overview of our is now available on YouTube</span></p>
                                            <em class="icon ni ni-external"></em>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown language-dropdown d-none d-sm-block mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="quick-icon border border-light">
                                                <img class="icon" src="./images/flags/english-sq.png" alt="">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-s1">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/english.png" alt="" class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/french.png" alt="" class="language-flag">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Abu Bin Ishtiyak</span>
                                                        <span class="sub-text">info@softnio.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                       @yield('content')
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item dropup">
                                        <a herf="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-toggle="modal" data-target="#region" class="nav-link"><em class="icon ni ni-globe"></em><span class="ml-1">Select Region</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>

    <!-- JavaScript -->
    <script src="{{mix('js/jquery.min.js')}}"></script>
    <script src="{{mix('js/theme.js')}}"></script>
    <script src="{{mix('js/toastr.js')}}"></script>
    <script src="{{mix('js/jquery.dataTables.js')}}"></script>
    @yield('scripts')
</body>

</html>
