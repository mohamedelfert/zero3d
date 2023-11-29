<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . $page='home') }}"><img
                src="{{ setting()->logo_path }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='home') }}"><img
                src="{{ setting()->logo_path }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='home') }}"><img
                src="{{ setting()->logo_path }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='home') }}"><img
                src="{{ setting()->logo_path }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                         src="{{ setting()->logo_path }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ setting()->site_name_en }}</h4>
                    <span class="mb-0 text-muted">{{ setting()->site_name_en }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <i class="side-menu__icon fa fa-home"></i>
                    <span class="side-menu__label">@lang('main.dashboard')</span>
                </a>
            </li>

            <li class="side-item side-item-category">test</li>
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <i class="side-menu__icon fa fa-utensils"></i>
                    <span class="side-menu__label">test</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <i class="side-menu__icon fa fa-hand-holding"></i>
                    <span class="side-menu__label">test</span>
                </a>
            </li>

            <li class="side-item side-item-category">test</li>
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <i class="side-menu__icon fa fa-truck"></i>
                    <span class="side-menu__label">test</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
<div class="main-content app-content">
