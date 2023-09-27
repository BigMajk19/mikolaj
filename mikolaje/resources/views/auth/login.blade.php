@include('layouts.inc.loginhead')

<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
              <div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="authlogin-side-wrapper">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2">
                      Mikołaj<span>NaŚwięta</span><br/>
                      <h6>System CRM</h6>
                    </a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                      @csrf
                      <!--Email/Username placeholder-->
                      <div class="mb-3">
                        <label for="login" class="form-label">Email/Username</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Email/Username">
                      </div>
                      <!--Password placeholder-->
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password" placeholder="Password">
                      </div>
                      <!--Remember Me-->
                      <div class="form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                        <label class="form-check-label" for="remember_me">
                          Remember me
                        </label>
                      </div>
                      <!--Submit button Login-->
                      <div>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          Login
                        </button>
                      </div>
                      <a href="{{ route('register') }}" class="d-block mt-3 text-muted">
                        Not a user? Sign up
                      </a>
                      @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- core:js -->
  <script src="{{ asset('../../../assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset('../../../assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('../../../assets/js/template.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <!-- End custom js for this page -->

</body>
</html>
