<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- edit -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Series</h5>
                <small class="text-muted float-end">edit section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('audioseries.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                    @method('put')

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') ?? $title }}" id="title" name="title" placeholder="Type..." />
                    
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
    
                
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">Content</label>
                    <textarea
                      class="form-control @error('body') is-invalid @enderror"
                      placeholder="Type content..."
                      id="editor"
                      name="body"
                    >{{ old('body') ?? $body }}</textarea>
    
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <button type="submit" class="btn btn-primary rounded-0">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>