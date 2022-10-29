<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <div class="d-flex justify-content-between py-3 px-4">
            <div><h5>Information</h5></div>
          </div>

          <div class="card-body">
            <div class="row justify-content-start align-items-center g-2">
                <div class="col-md-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">About Us</h5>
                        <p class="card-text">{!! Str::limit($about_us, 150) !!}</p>
                        <a href="{{ route('info.about') }}" class="btn btn-success btn-sm"><i class='bx bx-edit-alt' ></i></a>
                    </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Us</h5>
                        <p class="card-text">{!! Str::limit($contact_us, 150) !!}</p>
                        <a href="{{ route('info.contact') }}" class="btn btn-success btn-sm"><i class='bx bx-edit-alt' ></i></a>
                    </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recommended</h5>
                        <p class="card-text">{!! Str::limit($recommend, 150) !!}</p>
                        <a href="{{ route('info.recommend') }}" class="btn btn-success btn-sm"><i class='bx bx-edit-alt' ></i></a>
                    </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Privacy Policy</h5>
                        <p class="card-text">{!! Str::limit($privacy_policy, 150) !!}</p>
                        <a href="{{ route('info.policy') }}" class="btn btn-success btn-sm"><i class='bx bx-edit-alt' ></i></a>
                    </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Terms and Condition</h5>
                        <p class="card-text">{!! Str::limit($terms, 150) !!}</p>
                        <a href="{{ route('info.terms') }}" class="btn btn-success btn-sm"><i class='bx bx-edit-alt' ></i></a>
                    </div>
                    </div>
                </div>
             </div>
          </div>
          
        </div>
        <!--/ Basic Bootstrap Table -->

        


        <!--/ Responsive Table -->
      </div>
      <!-- / Content -->
</x-app-layout>