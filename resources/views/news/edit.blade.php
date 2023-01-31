<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit News</h5>
                <small class="text-muted float-end"><a class="btn btn-sm btn-primary rounded-0" href="{{ route('news.create') }}">Publish New News</a></small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('news.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                    @method('put')

                    <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="basic-default-title">Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') ?? $title }}" id="title" name="title" placeholder="Type..." />
                      
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="basic-default-title">publish status</label>
                      <select class="form-control @error('published') is-invalid @enderror" name="published" id="published">
                          <option value="1" {{ $published == '1' ? 'selected' : '' }}>Publish</option>
                          <option value="0" {{ $published == '0' ? 'selected' : '' }}>Unpublish</option>
                      </select>

                      @error('published')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
    
                  <div class="mb-3">
                    <label class="form-label text-danger" for="basic-default-thumbnail">Change Thumbnail</label>
                    <input type="file" class="dropify form-control @error('thumbnail') is-invalid @enderror" 
                    data-default-file="/storage/{{ $thumbnail }}" 
                    id="basic-default-thumbnail" 
                    value="{{ old('thumbnail') }}" name="thumbnail" />
                    
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

                    
    
                  <button type="submit" class="btn btn-primary rounded-0">Publish</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>