<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Audio</h5>
                <small class="text-muted float-end">edit section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('audio.update', $id) }}" enctype="multipart/form-data">
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
                    <img height="50" width="50" src="/storage/{{ $thumbnail }}" alt="">
                    <label class="form-label text-danger" for="basic-default-thumbnail">Change Thumbnail</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="basic-default-thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" name="thumbnail" />
                    
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    
                    <audio controls>
                        <source src="/storage/{{ $audioFile }}" type="audio/ogg">
                        Your browser does not support the audio element.
                      </audio>
                    <label class="form-label text-danger" for="basic-default-audio">Change audio</label>
                    <input type="file" class="form-control @error('audio') is-invalid @enderror" id="basic-default-audio" id="audio" value="{{ old('audio') }}" name="audio" />
                    
                    @error('audio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">Content</label>
                    <textarea
                      id="basic-default-content"
                      class="form-control @error('body') is-invalid @enderror"
                      placeholder="Type content..."
                      id="body"
                      name="body"
                    >{{ old('body') ?? $body }}</textarea>
    
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                     <div class="mb-3">
                        <label>Series category</label>
                        <select class="form-control @error('audioserie_id') is-invalid @enderror" name="audioserie_id" id="audioserie_id">
                            @foreach ($series as $serie)
                            <option value="{{ $serie->id }}" {{ $audioserie_id == $serie->id ? 'selected' : '' }}>{{ $serie->title }}</option>
                            @endforeach
                        </select>

                        @error('audioserie_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
    
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>