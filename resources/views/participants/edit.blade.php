<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Admin Info</h5>
                <small class="text-muted float-end">edit section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('users.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                    @method('put')

                    <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">Name</label>
                          <input type="text" id="nameBasic" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $name }}" placeholder="Enter Name" required />
                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
        
                      <div class="row g-2">
                        <div class="col mb-3">
                          <label for="emailBasic" class="form-label">Email</label>
                          <input type="text" id="emailBasic" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $email }}" placeholder="xxxx@xxx.xx" required />
                          @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                        <div class="col mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="New Password" />
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Update admin</button>
                    </div>
    
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>