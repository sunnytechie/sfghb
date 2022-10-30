<x-app-layout>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- New devotion -->
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Compose</h5>
            <small class="text-muted float-end">create new</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('devotions.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label class="form-label" for="basic-default-title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') }}" id="title" name="title" placeholder="Type..." />
                
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-thumbnail">Thumbnail</label>
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="basic-default-thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" name="thumbnail" />
                
                @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-audio">Audio</label>
                <input type="file" class="form-control @error('audio') is-invalid @enderror" id="basic-default-audio" id="audio" value="{{ old('audio') }}" name="audio" />
                
                @error('audio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-read_date">Read Date</label>
                <input type="date" class="form-control @error('read_date') is-invalid @enderror" id="basic-default-read_date" id="read_date" value="{{ old('read_date') }}" name="read_date"/>
              
                @error('read_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-content">Reading</label>
                <textarea
                  id="basic-default-content"
                  class="form-control @error('reading') is-invalid @enderror"
                  placeholder="Type content..."
                  id="reading"
                  name="reading"
                >{{ old('reading') }}</textarea>

                @error('reading')
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
                >{{ old('body') }}</textarea>

                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="mb-3">
                <label>publish status</label>
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

              <button type="submit" class="btn btn-primary">Publish</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->
</x-app-layout>