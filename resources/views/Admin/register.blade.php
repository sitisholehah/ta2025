<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PT. GOVINDO UTAMA - Register</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('corona/template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('corona/template/assets/vendors/css/vendor.bundle.base.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('corona/template/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('corona/template/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-5 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form method="POST" action="{{ route('register.progress') }}">
                  @csrf

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" class="form-control p_input" value="{{ old('name') }}" required autofocus>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control p_input" value="{{ old('email') }}" required>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control p_input" required>
                  </div>

                  <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control p_input" required>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>

                  <p class="sign-up text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('corona/template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('corona/template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('corona/template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('corona/template/assets/js/misc.js') }}"></script>
    <script src="{{ asset('corona/template/assets/js/settings.js') }}"></script>
    <script src="{{ asset('corona/template/assets/js/todolist.js') }}"></script>
  </body>
</html>
