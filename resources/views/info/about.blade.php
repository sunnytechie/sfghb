<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- Update About -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">About Us</h5>
                <small class="text-muted float-end">section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('info.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">Content</label>
                    <textarea
                      class="form-control @error('about_us') is-invalid @enderror"
                      placeholder="Type content..."
                      id="editor"
                      name="about_us"
                    >{{ $about_us ?? old('about_us') }}</textarea>
    
                    @error('about_us')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
    
                  <button type="submit" class="btn btn-primary rounded-0">Publish</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>