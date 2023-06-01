<x-app-layout>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- New devotion -->
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Compose</h5>
            {{-- <small class="text-muted float-end"><a class="btn btn-sm btn-primary rounded-0" href="{{ route('devotions.create') }}">Create New</a></small> --}}
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('devotions.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <div class="col-md-6 from-group">
                  <label class="form-label" for="basic-default-title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') }}" id="title" name="title" placeholder="Devotion title" />
                  
                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="col-md-6 from-group">
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

              <div class="row mb-3">
                <div class="col-md-6 from-group">
                  <label class="form-label" for="anchor_bible_text">Anchor Scripture</label>
                  <input type="text" class="form-control @error('anchor_bible_text') is-invalid @enderror" id="basic-default-anchor_bible_text" value="{{ old('anchor_bible_text') }}" id="anchor_bible_text" name="anchor_bible_text" placeholder="For God so love the world..." />
                  
                  @error('anchor_bible_text')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="col-md-6 from-group">
                  <label class="form-label" for="anchor_bible_chapter_verse">Anchor Bible reference</label>
                  <input type="text" class="form-control @error('anchor_bible_chapter_verse') is-invalid @enderror" id="basic-default-anchor_bible_chapter_verse" value="{{ old('anchor_bible_chapter_verse') }}" id="anchor_bible_chapter_verse" name="anchor_bible_chapter_verse" placeholder="John 3:16" />
                  
                  @error('anchor_bible_chapter_verse')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 from-group">
                  <label class="form-label" for="bible_reading_chapter_verse">Bible reading reference</label>
                  <input type="text" class="form-control @error('bible_reading_chapter_verse') is-invalid @enderror" id="basic-default-bible_reading_chapter_verse" value="{{ old('bible_reading_chapter_verse') }}" id="bible_reading_chapter_verse" name="bible_reading_chapter_verse" placeholder="John 3:1-16" />
                  
                  @error('bible_reading_chapter_verse')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="col-md-6 from-group">
                  <label class="form-label" for="further_reading">Further reading reference</label>
                  <input type="text" class="form-control @error('further_reading') is-invalid @enderror" id="basic-default-further_reading" value="{{ old('further_reading') }}" id="further_reading" name="further_reading" placeholder="John 3:16-20" />
                  
                  @error('further_reading')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12 from-group">
                  <label class="form-label" for="prayer">prayer</label>
                  <input type="text" class="form-control @error('prayer') is-invalid @enderror" id="basic-default-prayer" value="{{ old('prayer') }}" id="prayer" name="prayer" placeholder="Our Dearly beloved heavenly father..." />
                  
                    @error('prayer')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3">
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
                  class="form-control @error('reading') is-invalid @enderror"
                  placeholder="Bible reading here..."
                  id="editor01"
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
                  class="form-control @error('body') is-invalid @enderror"
                  placeholder="Content here..."
                  id="editor"
                  name="body"
                >{{ old('body') }}</textarea>

                @error('body')
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