<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New Reels -->
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">New Reels</h5>
                <small class="text-muted float-end">new section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('reels.store') }}" enctype="multipart/form-data">
                  @csrf
    
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label" for="basic-default-title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') }}" id="title" name="title" placeholder="Title..." />
                    
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="col-md-6">
                    <label class="form-label" for="basic-default-title">publish status</label>
                    <select class="form-control @error('published') is-invalid @enderror" name="published" id="published">
                        <option selected value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
    
                    @error('published')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-file">File</label>
                    <input type="file" class="dropify form-control @error('file') is-invalid @enderror" id="basic-default-file" id="file" value="{{ old('file') }}" name="file" />
                    
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
    
                  
    
               
                  <button type="submit" class="btn btn-primary">Publish</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>