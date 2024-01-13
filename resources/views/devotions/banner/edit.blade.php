<title>Banner - SFGHB</title>
<x-app-layout>

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Update About -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update yearly devotional banner</h5>
                <small class="text-muted float-end">section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('update.banner', $banner->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-content">title(Ex. 2024)</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $banner->title }}" name="title" id="title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-content">description (Slogan)</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{ $banner->description }}" name="description" id="description" required>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-content">image (Get image link(address) from pixabay.com)</label>
                        <input type="url" class="form-control @error('image') is-invalid @enderror" value="{{ $banner->image }}" name="image" id="image" required>


                        @error('image')
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
