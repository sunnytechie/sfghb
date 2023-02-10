<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="Admin Dashboard" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="Searching for God's heartbeat - Sisters' Fellowship International." />
    <meta property="og:image" content="{{ asset('assets/img/sfghb.png') }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:alt" content="{{ config('app.name') }}" />
    <title>SFGHB index table.</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/sfghb.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    {{-- Datable starts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('assets/js/config.js') }}"></script>

    <style>
        .dataTables_length {
            padding-left: 20px !important;
        }

        #myTable_filter {
            padding-right: 22px !important;
        }

        #myTable_filter input.form-control {
            padding: 10px;
            width: 250px;
        }

        .dataTables_info {
            padding-left: 20px !important;
        }
        
        ul.pagination {
            padding-right: 20px !important;
        }

        .table-responsive {
            padding-bottom: 15px !important;
        }
    </style>
  </head>
  <body>

     <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')


            <!-- Layout container -->
            <div class="layout-page">
                
                @include('layouts.navigation')

                <!-- Page Content -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <main>
                        @yield('content')
                    </main>
                    @include('layouts.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            <!-- / Layout page -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    {{-- End datatable link --}}

    <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable();
      } );
    </script>

    {{-- Google CDN --}}
    
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
   <script>
        setTimeout(() => {
            const box = document.getElementById('bottomAlert');
            // 👇️ removes element from DOM
            // 👇️ hides element (still takes up space on page)
            // box.style.visibility = 'hidden';
            }, 1500);
    </script>      
  </body>
</html>
