<x-guest-layout>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-2">
                  <a href="{{ route('login') }}" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img width="50" height="50" src="{{ asset('assets/img/sfghb.png') }}" alt="SFGHB">
                    </span> 
                  </a>
                </div>
                <!-- /Logo -->
                <p class="mb-4 text-center">Sign-up</p>
  
               
                <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                    @csrf
  
                  <div>
                    <label for="name" class="form-label">User Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Enter your name"
                      required
                    />
                    <label><x-input-error :messages="$errors->get('name')" class="mt-1" /></label>
                  </div>
  
                  <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required/>
                  <label><x-input-error :messages="$errors->get('email')" class="mt-1" /></label>
                </div>
  
                  <div class="form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="New Password"
                        aria-describedby="password"
                        required
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <label><x-input-error :messages="$errors->get('password')" class="mt-1" /></label>
                  </div>
  
                  <div class="form-password-toggle">
                    <label class="form-label" for="password">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password_confirmation" 
                        required
                        placeholder="Repeat Password"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <label><x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" /></label>
                  </div>
  
                  <div>
                    <div class="mb-3 form-check">
                      <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                      <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                      </label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary d-grid w-100" style="background: #ec1717">Sign up</button>
                </form>
  
              
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>
  </x-guest-layout>