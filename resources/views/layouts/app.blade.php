<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>My Java Learning Center - Courses</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images//favicon-16x16.png">
    <!-- Bootstrap v5.0.2 css -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/css/owl.theme.default.min.css">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="/css/slick.css">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="/css/off-canvas.css">
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href="/fonts/linea-fonts.css">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="/fonts/flaticon.css">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="/css/magnific-popup.css">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="/css/rsmenu-main.css">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="/css/rs-spacing.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/css/style.css"> <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @stack('styles')
    @vite(['resources/js/app.js'])
</head>

<body class="defult-home">
    <div id="app">
         <!--Preloader area start here-->
         <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'>
                    <img src="/images/loader-logo.png" alt="">
                </div>
            </div>
        </div>
        <!--Preloader area End here-->

        @include('shared.header')

        <!--Full width header End-->
        <!-- Main content Start -->
        <div class="main-content">
            @yield('content')
        </div>
        <!-- Main content End -->

        <!-- Footer Start -->
        @include('shared.footer')
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div class="modal fade search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <button type="button" class="close" data-bs-dismiss="modal">
                <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">kgjkgdkugds</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modernizr js -->
    <script src="/js/modernizr-2.8.3.min.js"></script>
    <!-- jquery latest version -->
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap v5.0.2 js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Menu js -->
    <script src="/js/rsmenu-main.js"></script>
    <!-- op nav js -->
    <script src="/js/jquery.nav.js"></script>
    <!-- owl.carousel js -->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- Slick js -->
    <script src="/js/slick.min.js"></script>
    <!-- isotope.pkgd.min js -->
    <script src="/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="/js/imagesloaded.pkgd.min.js"></script>
    <!-- wow js -->
    <script src="/js/wow.min.js"></script>
    <!-- Skill bar js -->
    <script src="/js/skill.bars.jquery.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <!-- counter top js -->
    <script src="/js/waypoints.min.js"></script>
    <!-- video js -->
    <script src="/js/jquery.mb.YTPlayer.min.js"></script>
    <!-- magnific popup js -->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <!-- plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- contact form js -->
    <script src="/js/contact.form.js"></script>
    <!-- main js -->
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
