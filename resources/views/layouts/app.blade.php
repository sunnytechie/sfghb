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
                    setTimeout(() => {
                        const box = document.getElementById('bottomAlert');
                        // 👇️ removes element from DOM
                        // 👇️ hides element (still takes up space on page)
                        // box.style.visibility = 'hidden';
                        }, 1500);
                </script>

            <!-- The core Firebase JS SDK is always required and must be listed first -->
            <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

            <!-- TODO: Add SDKs for Firebase products that you want to use
                https://firebase.google.com/docs/web/setup#available-libraries -->

            <script>
                // Your web app's Firebase configuration
                var firebaseConfig = {
                    apiKey: "AIzaSyBofYN7-qW0zO11WeeMo0o4Gbe4qy-46v8",
                    authDomain: "sfghb-65a08.firebaseapp.com",
                    projectId: "sfghb-65a08",
                    storageBucket: "sfghb-65a08.appspot.com",
                    messagingSenderId: "670553009664",
                    appId: "1:670553009664:web:f10bf041c1d80689e472e5",
                    measurementId: "G-3QXEFF14ZN"
                };
                // Initialize Firebase
                firebase.initializeApp(firebaseConfig);

                const messaging = firebase.messaging();

                function initFirebaseMessagingRegistration() {
                    messaging.requestPermission().then(function () {
                        return messaging.getToken()
                    }).then(function(token) {
                        
                        axios.post("{{ route('fcmToken') }}",{
                            _method:"PATCH",
                            token
                        }).then(({data})=>{
                            console.log(data)
                        }).catch(({response:{data}})=>{
                            console.error(data)
                        })

                    }).catch(function (err) {
                        console.log(`Token Error :: ${err}`);
                    });
                }

                initFirebaseMessagingRegistration();
            
                messaging.onMessage(function({data:{body,title}}){
                    new Notification(title, {body});
                });
            </script>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
    </body>
</html>
