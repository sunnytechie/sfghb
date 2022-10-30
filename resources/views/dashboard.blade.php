<x-app-layout>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<!-- Basic Bootstrap Table -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #3b5f69">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Users</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $users->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bxs-user-account text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #F16C69">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Admin</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $admins->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bx-user-pin text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #F5B225">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Devotionals</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $devotions->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bx-bible text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #52553c">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Events</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $events->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bx-calendar-event text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #3b5f69">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">News</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $news->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bxs-news text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #F16C69">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Payments</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $payments->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bxs-credit-card-alt text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #F5B225">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Donations</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $donations->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bx-credit-card-alt text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #52553c">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Audio</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $audio->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bx-podcast text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #3b5f69">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Feedback</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $feedbacks->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bxs-chat text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card mini-stat position-relative" style="background: #F16C69">
                <a href="#">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase verti-label text-white-50">Healths</h6>
                                <h3 class="mb-3 mt-0 text-white">{{ $health->count() }}</h3>
                            </div>
                            <div class="mini-stat-icon"><i class='bx bx-health text-white-50' style="font-size: 60px"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
