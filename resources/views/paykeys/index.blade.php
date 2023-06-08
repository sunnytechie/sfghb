<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- Update About -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Payment Key Settings</h5>
                <small class="text-muted float-end">Paystack</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('paykeys.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
    
                  <div class="mb-3">
                    <label class="form-label" for="paystack_test_secret_key">Paystack test secret key</label>
                    <input type="text" class="form-control @error('paystack_test_secret_key') is-invalid @enderror" id="paystack_test_secret_key" value="{{ old('paystack_test_secret_key') ?? $paystack_test_secret_key }}" id="paystack_test_secret_key" name="paystack_test_secret_key" placeholder="Type..." />
                    
                    @error('paystack_test_secret_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="paystack_test_public_key">Paystack test public key</label>
                    <input type="text" class="form-control @error('paystack_test_public_key') is-invalid @enderror" id="paystack_test_public_key" value="{{ old('paystack_test_public_key') ?? $paystack_test_public_key }}" id="paystack_test_public_key" name="paystack_test_public_key" placeholder="Type..." />
                    
                    @error('paystack_test_public_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="paystack_live_secret_key">Paystack live secret key</label>
                    <input type="text" class="form-control @error('paystack_live_secret_key') is-invalid @enderror" id="paystack_live_secret_key" value="{{ old('paystack_live_secret_key') ?? $paystack_live_secret_key }}" id="paystack_live_secret_key" name="paystack_live_secret_key" placeholder="Type..." />
                    
                    @error('paystack_live_secret_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="paystack_live_public_key">Paystack live public key</label>
                    <input type="text" class="form-control @error('paystack_live_public_key') is-invalid @enderror" id="paystack_live_public_key" value="{{ old('paystack_live_public_key') ?? $paystack_live_public_key }}" id="paystack_live_public_key" name="paystack_live_public_key" placeholder="Type..." />
                    
                    @error('paystack_live_public_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="devotion_price">Naira Devotions Price</label>
                    <input type="number" class="form-control @error('devotion_price') is-invalid @enderror" id="devotion_price" value="{{ old('devotion_price') ?? $devotion_price }}" id="devotion_price" name="devotion_price" placeholder="Type..." />
                    
                    @error('devotion_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="devotion_usd_price">USD Devotions Price</label>
                    <input type="number" class="form-control @error('devotion_usd_price') is-invalid @enderror" id="devotion_usd_price" value="{{ old('devotion_usd_price') ?? $devotion_usd_price }}" id="devotion_usd_price" name="devotion_usd_price" placeholder="10USD" />
                    
                    @error('devotion_usd_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="naira_monthly_price">Naira Monthly Subscribe Price</label>
                    <input type="number" class="form-control @error('naira_monthly_price') is-invalid @enderror" id="naira_monthly_price" value="{{ old('naira_monthly_price') ?? $naira_monthly_price }}" id="naira_monthly_price" name="naira_monthly_price" placeholder="10USD" />
                    
                    @error('naira_monthly_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="usd_monthly_price">USD Monthly Subscribe Price</label>
                    <input type="number" class="form-control @error('usd_monthly_price') is-invalid @enderror" id="usd_monthly_price" value="{{ old('usd_monthly_price') ?? $usd_monthly_price }}" id="usd_monthly_price" name="usd_monthly_price" placeholder="10USD" />
                    
                    @error('usd_monthly_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="naira_yearly_price">Naira Yearly Subscribe Price</label>
                    <input type="number" class="form-control @error('naira_yearly_price') is-invalid @enderror" id="naira_yearly_price" value="{{ old('naira_yearly_price') ?? $naira_yearly_price }}" id="naira_yearly_price" name="naira_yearly_price" placeholder="10USD" />
                    
                    @error('naira_yearly_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="usd_yearly_price">USD Yearly Subscribe Price</label>
                    <input type="number" class="form-control @error('usd_yearly_price') is-invalid @enderror" id="usd_yearly_price" value="{{ old('usd_yearly_price') ?? $usd_yearly_price }}" id="usd_yearly_price" name="usd_yearly_price" placeholder="10USD" />
                    
                    @error('usd_yearly_price')
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