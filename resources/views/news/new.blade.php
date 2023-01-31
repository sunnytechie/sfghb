<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Compose news</h5>
                <small class="text-muted float-end">new section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label" for="basic-default-title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') }}" id="title" name="title" placeholder="Title here" />
                    
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
                    <label class="form-label" for="basic-default-thumbnail">Thumbnail</label>
                    <input type="file" class="dropify form-control @error('thumbnail') is-invalid @enderror" id="basic-default-thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" name="thumbnail" />
                    
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">Content</label>
                    <textarea
                      class="form-control @error('body') is-invalid @enderror"
                      placeholder="Post..."
                      id="editor"
                      name="body"
                    >{{ old('body') }}</textarea>
    
                    @error('body')
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