<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Social Media handle</h5>
                <small class="text-muted float-end">social section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('social.update', $id) }}">
                  @csrf
                    @method('put')

                <div class="mb-3">
                    <label class="form-label" for="basic-default-instagram">Instagram</label>
                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="basic-default-instagram" value="{{ old('instagram') ?? $instagram }}" id="instagram" name="instagram" placeholder="Type..." />
                    
                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-twitter">Twitter</label>
                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="basic-default-twitter" value="{{ old('twitter') ?? $twitter }}" id="twitter" name="twitter" placeholder="Type..." />
                    
                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-facebook">Facebook</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="basic-default-facebook" value="{{ old('facebook') ?? $facebook }}" id="facebook" name="facebook" placeholder="Type..." />
                    
                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="basic-default-phone" value="{{ old('phone') ?? $phone }}" id="phone" name="phone" placeholder="Type..." />
                    
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="basic-default-email" value="{{ old('email') ?? $email }}" id="email" name="email" placeholder="Type..." />
                    
                    @error('email')
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