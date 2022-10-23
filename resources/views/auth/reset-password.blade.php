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
                <p class="mb-4 text-center">Reset your password</p>

                 <!-- Session Status -->
              <x-auth-session-status class="mb-4" :status="session('status')" />
  
                <form id="formAuthentication" class="mb-3" action="{{ route('password.update') }}" method="POST">
                    @csrf

                    <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                 <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <x-text-input 
                    type="email" 
                    class="form-control shadow-none rounded-0" 
                    id="email" 
                    type="email" 
                    name="email" :value="old('email', $request->email)" 
                    required 
                    />
                  </div>

                  <div class="mb-3 form-password-toggle">
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
                  </div>

                  <div class="mb-3 form-password-toggle">
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
                  </div>
  
                  
                  <button type="submit" class="btn btn-primary d-grid w-100" style="background: #1781ec">Reset Password</button>
                </form>
  
                <p class="text-center">
                  <span>Already have an account?</span>
                  <a href="{{ route('login') }}">
                    <span>Sign in instead</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>
</x-guest-layout>