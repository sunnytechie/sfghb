<x-guest-layout>
    
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner py-4">
            <!-- Forgot Password -->
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
                <h4 class="mb-2 text-center">Forgot Password? 🔒</h4>
                <p class="mb-4 text-center">Enter your email and we'll send you instructions to reset your password</p>
  
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
  
  
                <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
                    @csrf
  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Enter your email"
                      :value="old('email')"
                       required 
                       autofocus
                    />
                    <label for="error"><x-input-error :messages="$errors->get('email')" class="mt-2" /></label>
                  </div>
                  <button type="submit" class="btn btn-primary d-grid w-100" style="background: #1781ec">Send Reset Link</button>
                </form>
                <div class="text-center">
                  <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Back to login
                  </a>
                </div>
              </div>
            </div>
            <!-- /Forgot Password -->
          </div>
        </div>
      </div>
    
  </x-guest-layout>