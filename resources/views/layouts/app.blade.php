<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template-free"
 >
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

        <title>{{ config('app.name', 'SFGHB') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/sfghb.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

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

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('assets/js/config.js') }}"></script>
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="https://cdn.tiny.cloud/1/ifprekyziwmwbff5pm4lgrqgmsm0x5yaew0tctgdk95r94ae/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        {{-- Ckeditor --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

        {{-- datatables --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        
        {{-- Dropify css --}}
        <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
        <style>
            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }
            .ck-content .image {
                /* block images */
                max-width: 80%;
                margin: 20px auto;
            }

            input, select, option {
                border-radius: 0px !important;
            }
      </style>
    </head>
    <body class="font-sans antialiased">
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
                            {{ $slot }}
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

                {{-- Google CDN --}}
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <!-- Core JS -->

                {{-- Datatable --}}

                <!-- build:js assets/vendor/js/core.js -->
                <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
                <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        
                <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
                <!-- endbuild -->
        
                <!-- Vendors JS -->
                <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
        
                <!-- Main JS -->
                <script src="{{ asset('assets/js/main.js') }}"></script>
        
                <!-- Page JS -->
                <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
        
                <!-- Place this tag in your head or just before your close body tag. -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>

                
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor01' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
        
                <script>
                    setTimeout(() => {
                        const box = document.getElementById('bottomAlert');
                        // 👇️ removes element from DOM
                        // 👇️ hides element (still takes up space on page)
                        // box.style.visibility = 'hidden';
                        }, 1500);
                </script>      
           
           {{-- Dropify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    
    <script>
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element){
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e){
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
    {{-- disable submit button when it clicked --}}
    <script>
        $('form').submit(function (event) {
        if ($(this).hasClass('submitted')) {
            event.preventDefault();
            document.getElementById("submit").disabled = true;
        }
        else {
            $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
            $(this).addClass('submitted');
        }
    });
    </script>

   
    </body>
</html>
