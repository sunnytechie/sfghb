<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Livestream Video</h5>
                <small class="text-muted float-end">edit section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('livestream.update', $id) }}" enctype="multipart/form-data">
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
                    <label class="form-label" for="basic-default-url">Video</label>
                    <input type="url" class="form-control @error('url') is-invalid @enderror" id="basic-default-url" value="{{ old('url') ?? $url }}" id="url" name="url" placeholder="Type..." />
                    
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

            <div class="mb-3">
              <label class="form-label" for="basic-default-body">Description</label>
              <input type="text" class="form-control @error('body') is-invalid @enderror" id="basic-default-body" value="{{ old('body') ?? $body }}" id="body" name="body" placeholder="describe the event..." />
              
              @error('body')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-tags">Hashtags (seperated with a comma)</label>
                <input type="text" class="form-control @error('tags') is-invalid @enderror" id="basic-default-tags" value="{{ old('tags') ?? $tags }}" id="tags" name="tags" placeholder="#sfi #loveinaction #ydf #jesuswives" />
                
                @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-location">Event location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="basic-default-location" value="{{ old('location') ?? $location }}" id="location" name="location" placeholder="Jesus Transformation camp..." />
                
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-minister">Minister</label>
                <input type="text" class="form-control @error('minister') is-invalid @enderror" id="basic-default-minister" value="{{ old('minister') ?? $minister }}" id="minister" name="minister" placeholder="Rev. Mrs. Nche Iredu" />
                
                @error('minister')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
            </div>

            <div class="mb-3">
                <label>Visibility</label>
                <select class="form-control @error('visibility') is-invalid @enderror" name="visibility" id="visibility">
                    <option value="Public" {{ $visibility == 'Public' ? 'selected' : '' }}>Public</option>
                    <option value="Private" {{ $visibility == 'Private' ? 'selected' : '' }}>Private</option>
                </select>

                @error('visibility')
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