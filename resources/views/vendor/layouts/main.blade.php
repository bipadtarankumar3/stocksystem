<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/"
    data-base-url="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo"
    data-framework="laravel" data-template="vertical-menu-laravel-template-free">


<!-- Mirrored from demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2024 18:59:25 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Materio - HTML Laravel Free Admin Template </title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords"
        content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5, bootstrap 5 free, free admin template">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="Fh5jYGDPizn8OZeM3AxJp8ecY405k7hbJCFpTG8Y">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/materio-free-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
    </script>
    <!-- End Google Tag Manager -->


    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{URL::to('public/assets/admin/vendor/fonts/materialdesigniconsf861.css?id=9a16ed1a5c9f397c4fb730e76fd36384')}}" />
    <link rel="stylesheet"
        href="{{URL::to('public/assets/admin/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc')}}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{URL::to('public/assets/admin/vendor/css/core39e0.css?id=fdb5cd3f802d37d094730acf8fdcb33a')}}" />
    <link rel="stylesheet" href="{{URL::to('public/assets/admin/vendor/css/theme-default5761.css?id=da9b9645b9e4f480d38ea81168db36b7')}}" />
    <link rel="stylesheet" href="{{URL::to('public/assets/admin/css/demo2b5e.css?id=0f3ae65b84f44dbd4971231c5d97ac3b')}}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{URL::to('public/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbarda97.css?id=e542d5fe23051cba0a5aedb27dadd732')}}" />
        <link rel="stylesheet"
        href="{{ URL::to('public/assets/admin/css/style.css') }}" />
    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ URL::to('public/assets/admin/vendor/libs/apex-charts/apex-charts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href=" https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        span.select2.select2-container.select2-container--classic {
            width: 100% !important;
        }
    </style>

    <!-- Page Styles -->

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="{{URL::to('public/assets/admin/vendor/js/helpers.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{URL::to('public/assets/admin/js/config.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="../../../buttons.github.io/buttons.js')}}"></script>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.css">

</head>

<body>

    <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Layout Content -->
    <div class="layout-wrapper layout-content-navbar ">
        <div class="layout-container">

            @include('vendor.layouts.sidebar')
            @include('vendor.layouts.validation')
            @include('vendor.layouts.header')
        
            <!-- Left side column. contains the logo and sidebar -->
        
            @yield('content')
            @include('vendor.layouts.footer')
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    <!--/ Layout Content -->





    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{URL::to('public/assets/admin/vendor/libs/popper/poppere728.js?id=bd2c3acedf00f48d6ee99997ba90f1d8')}}"></script>
    <script src="{{URL::to('public/assets/admin/vendor/js/bootstrap05f9.js?id=0a1f83aa0a6a7fd382c37453e3f11128')}}"></script>
    <script src="{{URL::to('public/assets/admin/vendor/libs/node-waves/node-wavesa75b.js?id=0ca80150f23789eaa9840778ce45fc5c')}}"></script>
    <script src="{{URL::to('public/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbard295.js?id=f4192eb35ed7bdba94dcb820a77d9e47')}}">
    </script>
    <script src="{{URL::to('public/assets/admin/vendor/js/menuadfb.js?id=201bb3c555bc0ff219dec4dfd098c916')}}"></script>
    <script src="{{URL::to('public/assets/admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{URL::to('public/assets/admin/js/main270c.js?id=4f816bbbc912e9a5bcff6119bc265966')}}"></script>

    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{URL::to('public/assets/admin/js/dashboards-analytics.js')}}"></script>


        <!-- DataTable -->

        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    
        <script>
            $('#zero_config').DataTable({
                dom: 'Bfrtip',
                buttons: [
    
                ]
    
            });
            $('#report').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        </script>
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- End custom js for this page -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.js"></script>

    <script>
        function deleteConfirmation(ev) {
    
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute(
                'href'
                );
    
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
    
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
                    $.ajax({
                        type: 'POST',
                        url: urlToRedirect,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
    
                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                setTimeout(() => {
                            location.reload(true);
                        }, 1000);
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
    
                } else {
                    e.dismiss;
                }
    
            }, function (dismiss) {
                return false;
            })
        }
    </script>
    <!-- END: Page JS-->

    
    @yield('js')

</body>


<!-- Mirrored from demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2024 18:59:49 GMT -->

</html>
