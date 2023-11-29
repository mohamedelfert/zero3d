<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='home') }}"><img src="{{ setting()->logo_path }}"
                                                             class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='home') }}"><img src="{{ setting()->logo_path }}"
                                                             class="dark-logo-1" alt="logo"></a>
                {{--                <a href="{{ url('/' . $page='home') }}"><img src="{{ setting()->logo_path }}"--}}
                {{--                                                              class="logo-2" alt="logo"></a>--}}
                {{--                <a href="{{ url('/' . $page='home') }}"><img src="{{ setting()->logo_path }}"--}}
                {{--                                                              class="dark-logo-2" alt="logo"></a>--}}
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="{{@trans('main.search_for_anything')}}" type="search">
                <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                        <button type="reset" class="btn btn-default">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="submit" class="btn btn-default nav-link resp-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-search header-icon-svgs">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        </button>
                                    </span>
                        </div>
                    </form>
                </div>
                <div class="dropdown nav-item main-header-message ">
                    <a class="new nav-link" href="#">
                        <i class="fa fa-globe"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-message-list chat-scroll">
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="dropdown-item d-flex ">
                                        <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                                src="{{URL::asset('dashboard/img/flags/EG.png')}}" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">@lang('main.arabic')</span>
                                </div>
                            </a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="dropdown-item d-flex ">
                                        <span class="avatar  ml-3 align-self-center bg-transparent"><img
                                                src="{{URL::asset('dashboard/img/flags/US.png')}}" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">@lang('main.english')</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown nav-item main-header-message ">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-mail header-icon-svgs">
                            <path
                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span class=" pulse-danger"></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">@lang('main.messages')</h6>
                                <span
                                    class="badge badge-pill badge-warning mr-auto my-auto float-left">@lang('main.mark_all_read')</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread
                                messages</p>
                        </div>
                        <div class="main-message-list chat-scroll">
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  "
                                     data-image-src="{{URL::asset('dashboard/img/faces/3.jpg')}}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Petey Cruiser</h5>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image"
                                     data-image-src="{{URL::asset('dashboard/img/faces/2.jpg')}}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Jimmy Changa</h5>
                                    </div>
                                    <p class="mb-0 desc">All set ! Now, time to get to you now......</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 06 01:12 AM</p>
                                </div>
                            </a>
                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="text-center">@lang('main.view_all')</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-bell header-icon-svgs">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class=" pulse"></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">@lang('main.notifications')</h6>
                                <span
                                    class="badge badge-pill badge-warning mr-auto my-auto float-left">@lang('main.mark_all_read')</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread
                                Notifications</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">New files available</h5>
                                    <div class="notification-subtext">10 hour ago</div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3" href="#">
                                <div class="notifyimg bg-purple">
                                    <i class="la la-gem text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">Updates Available</h5>
                                    <div class="notification-subtext">2 days ago</div>
                                </div>
                                <div class="mr-auto">
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer">
                            <a href="">@lang('main.view_all')</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="">
                        <img alt="Photo" src="{{ setting()->logo_path }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    <img alt="" src="{{ setting()->logo_path }}" class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ setting()->site_name_en }}</h6>
                                    <span>{{ setting()->site_name_en  }}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-ghost"></i>test</a>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog"></i>test</a>
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out"></i>@lang('main.logout')</a>
                        {{--                                <form id="logout-form" action="#" method="POST" style="display: none;">--}}
                        {{--                                    @csrf--}}
                        {{--                                </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
<div class="container-fluid">
