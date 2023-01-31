<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Compose</h5>
                <small class="text-muted float-end">create new</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('audio.store') }}" enctype="multipart/form-data">
                  @csrf
    
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="basic-default-title">Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') }}" id="title" name="title" placeholder="Type..." />
                      
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="basic-default-title">Audio Series</label>
                      <select class="form-control @error('audioserie_id') is-invalid @enderror" name="audioserie_id" id="audioserie_id">
                          @foreach ($series as $serie)
                          <option selected value="{{ $serie->id }}">{{ $serie->title }}</option>
                          @endforeach
                      </select>

                      @error('audioserie_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="basic-default-thumbnail">Thumbnail</label>
                      <input type="file" class="dropify form-control @error('thumbnail') is-invalid @enderror" id="basic-default-thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" name="thumbnail" />
                      
                      @error('thumbnail')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="basic-default-audio">Audio</label>
                      <input type="file" class="dropify form-control @error('audio') is-invalid @enderror" id="basic-default-audio" id="audio" value="{{ old('audio') }}" name="audio" />
                      
                      @error('audio')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>
    
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">Content</label>
                    <textarea
                      class="form-control @error('body') is-invalid @enderror"
                      placeholder="Type content..."
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