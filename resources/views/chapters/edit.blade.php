<x-app-layout>
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <!-- New devotion -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Chapter details</h5>
                <small class="text-muted float-end">edit section</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('chapters.update', $id) }}" enctype="multipart/form-data">
                  @csrf
                    @method('put')

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-title">Chapter Name</label>
                    <input type="text" class="form-control @error('chapter') is-invalid @enderror" id="basic-default-chapter" value="{{ old('chapter') ?? $chapter }}" id="chapter" name="chapter" placeholder="Type..." />
                    
                    @error('chapter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label>State</label>
                    <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                        <option {{ $state == 'Abia' ? 'selected' : '' }}>Abia</option>
                        <option {{ $state == 'Adamawa' ? 'selected' : '' }}>Adamawa</option>
                        <option {{ $state == 'Akwa Ibom' ? 'selected' : '' }}>Akwa Ibom</option>
                        <option {{ $state == 'Anambra' ? 'selected' : '' }}>Anambra</option>
                        <option {{ $state == 'Bauchi' ? 'selected' : '' }}>Bauchi</option>
                        <option {{ $state == 'Bayelsa' ? 'selected' : '' }}>Bayelsa</option>
                        <option {{ $state == 'Benue' ? 'selected' : '' }}>Benue</option>
                        <option {{ $state == 'Borno' ? 'selected' : '' }}>Borno</option>
                        <option {{ $state == 'Cross River' ? 'selected' : '' }}>Cross River</option>
                        <option {{ $state == 'Delta' ? 'selected' : '' }}>Delta</option>
                        <option {{ $state == 'Ebonyi' ? 'selected' : '' }}>Ebonyi</option>
                        <option {{ $state == 'Edo' ? 'selected' : '' }}>Edo</option>
                        <option {{ $state == 'Ekiti' ? 'selected' : '' }}>Ekiti</option>
                        <option {{ $state == 'Enugu' ? 'selected' : '' }}>Enugu</option>
                        <option {{ $state == 'Gombe' ? 'selected' : '' }}>Gombe</option>
                        <option {{ $state == 'Imo' ? 'selected' : '' }}>Imo</option>
                        <option {{ $state == 'Jigawa' ? 'selected' : '' }}>Jigawa</option>
                        <option {{ $state == 'Kaduna' ? 'selected' : '' }}>Kaduna</option>
                        <option {{ $state == 'Kano' ? 'selected' : '' }}>Kano</option>
                        <option {{ $state == 'Katsina' ? 'selected' : '' }}>Katsina</option>
                        <option {{ $state == 'Kebbi' ? 'selected' : '' }}>Kebbi</option>
                        <option {{ $state == 'Kogi' ? 'selected' : '' }}>Kogi</option>
                        <option {{ $state == 'Kwara' ? 'selected' : '' }}>Kwara</option>
                        <option {{ $state == 'Lagos' ? 'selected' : '' }}>Lagos</option>
                        <option {{ $state == 'Nasarawa' ? 'selected' : '' }}>Nasarawa</option>
                        <option {{ $state == 'Niger' ? 'selected' : '' }}>Niger</option>
                        <option {{ $state == 'Ogun' ? 'selected' : '' }}>Ogun</option>
                        <option {{ $state == 'Ondo' ? 'selected' : '' }}>Ondo</option>
                        <option {{ $state == 'Osun' ? 'selected' : '' }}>Osun</option>
                        <option {{ $state == 'Oyo' ? 'selected' : '' }}>Oyo</option>
                        <option {{ $state == 'Plateau' ? 'selected' : '' }}>Plateau</option>
                        <option {{ $state == 'Rivers' ? 'selected' : '' }}>Rivers</option>
                        <option {{ $state == 'Sokoto' ? 'selected' : '' }}>Sokoto</option>
                        <option {{ $state == 'Taraba' ? 'selected' : '' }}>Taraba</option>
                        <option {{ $state == 'Yobe' ? 'selected' : '' }}>Yobe</option>
                        <option {{ $state == 'Zamfara' ? 'selected' : '' }}>Zamfara</option>
                        <option {{ $state == 'Abuja FCT' ? 'selected' : '' }}>Abuja FCT</option>
                    </select>

                    @error('state')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
        
                
    
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
    </x-app-layout>