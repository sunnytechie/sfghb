<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- Update About -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">About Us</h5>
                <small class="text-muted float-end">section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('paykeys.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
    
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-paystack_test_secret_key">Paystack test secret key</label>
                    <input type="text" class="form-control @error('paystack_test_secret_key') is-invalid @enderror" id="basic-default-paystack_test_secret_key" value="{{ old('paystack_test_secret_key') ?? $paystack_test_secret_key }}" id="paystack_test_secret_key" name="paystack_test_secret_key" placeholder="Type..." />
                    
                    @error('paystack_test_secret_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-paystack_test_public_key">Paystack test public key</label>
                    <input type="text" class="form-control @error('paystack_test_public_key') is-invalid @enderror" id="basic-default-paystack_test_public_key" value="{{ old('paystack_test_public_key') ?? $paystack_test_public_key }}" id="paystack_test_public_key" name="paystack_test_public_key" placeholder="Type..." />
                    
                    @error('paystack_test_public_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-paystack_live_secret_key">Paystack live secret key</label>
                    <input type="text" class="form-control @error('paystack_live_secret_key') is-invalid @enderror" id="basic-default-paystack_live_secret_key" value="{{ old('paystack_live_secret_key') ?? $paystack_live_secret_key }}" id="paystack_live_secret_key" name="paystack_live_secret_key" placeholder="Type..." />
                    
                    @error('paystack_live_secret_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-paystack_live_public_key">Paystack live public key</label>
                    <input type="text" class="form-control @error('paystack_live_public_key') is-invalid @enderror" id="basic-default-paystack_live_public_key" value="{{ old('paystack_live_public_key') ?? $paystack_live_public_key }}" id="paystack_live_public_key" name="paystack_live_public_key" placeholder="Type..." />
                    
                    @error('paystack_live_public_key')
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