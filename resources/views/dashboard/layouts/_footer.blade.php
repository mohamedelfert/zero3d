                <!-- Footer opened -->
                <div class="main-footer ht-40">
                    <div class="container-fluid pd-t-0-f ht-100p">
                        <span>Copyright © 2022 <a href="#">Dashboard 2.0</a>. All rights reserved. <strong>Mohamed Ibrahiem</strong></span>
                    </div>
                </div>
                <!-- Footer closed -->
                <!-- Back-to-top -->
                <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
                <!-- JQuery min js -->
                <script src="{{URL::asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
                <!-- Bootstrap Bundle js -->
                <script src="{{URL::asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                <!-- Ionicons js -->
                <script src="{{URL::asset('dashboard/plugins/ionicons/ionicons.js')}}"></script>
                <!-- Moment js -->
                <script src="{{URL::asset('dashboard/plugins/moment/moment.js')}}"></script>
                <!-- Rating js-->
                <script src="{{URL::asset('dashboard/plugins/rating/jquery.rating-stars.js')}}"></script>
                <script src="{{URL::asset('dashboard/plugins/rating/jquery.barrating.js')}}"></script>
                <!--Internal  Perfect-scrollbar js -->
                <script src="{{URL::asset('dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
                <script src="{{URL::asset('dashboard/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
                <!--Internal Sparkline js -->
                <script src="{{URL::asset('dashboard/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
                <!-- Custom Scroll bar Js-->
                <script src="{{URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
                <!-- right-sidebar js -->
                <script src="{{URL::asset('dashboard/plugins/sidebar/sidebar-rtl.js')}}"></script>
                <script src="{{URL::asset('dashboard/plugins/sidebar/sidebar-custom.js')}}"></script>
                <!-- Eva-icons js -->
                <script src="{{URL::asset('dashboard/js/eva-icons.min.js')}}"></script>

                @toastr_js
                @toastr_render
                @stack('js')

                <!-- Sticky js -->
                <script src="{{URL::asset('dashboard/js/sticky.js')}}"></script>
                <!-- custom js -->
                <script src="{{URL::asset('dashboard/js/custom.js')}}"></script><!-- Left-menu js-->
                <script src="{{URL::asset('dashboard/plugins/side-menu/sidemenu.js')}}"></script>
            </div>
        </div>
    </body>
</html>
