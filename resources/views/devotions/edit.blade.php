<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit donation</h5>
                <small class="text-muted float-end"><a class="btn btn-sm btn-primary rounded-0" href="{{ route('devotions.create') }}">Create New</a></small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('devotions.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                    @method('put')

                  <div class="row mb-3">
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
    
                  <div class="row mb-3">
                  <div class="col-md-6">
                    {{-- /storage/{{ $thumbnail }} --}}
                    <label class="form-label text-danger" for="basic-default-thumbnail">Change Thumbnail</label>
                    <input type="file" data-default-file="/storage/{{ $thumbnail ?? old('thumbnail') }}" class="dropify form-control @error('thumbnail') is-invalid @enderror" id="basic-default-thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" name="thumbnail" />
                    
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="col-md-6">
                      <label class="form-label text-danger" for="basic-default-audio">Change audio</label>
                      <input type="file" data-default-file="/storage/{{ $audioFile ?? old('audioFile') }}" class="dropify form-control @error('audio') is-invalid @enderror" id="basic-default-audio" id="audio" value="{{ old('audio') }}" name="audio" />
                  
                    @error('audio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-read_date">Read Date</label>
                    <input type="date" class="form-control @error('read_date') is-invalid @enderror" id="basic-default-read_date" id="read_date" value="{{ old('read_date') ?? $read_date }}" name="read_date"/>
                  
                    @error('read_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">Reading</label>
                    <textarea
                      class="form-control @error('reading') is-invalid @enderror"
                      placeholder="Type content..."
                      id="editor01"
                      name="reading"
                    >{{ old('reading') ?? $reading }}</textarea>
    
                    @error('reading')
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