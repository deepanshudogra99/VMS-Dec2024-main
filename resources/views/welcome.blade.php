<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Livewire Styles -->
    @livewireStyles
  </head>

  <body>
    <x-header></x-header>
    <div class="container-fluid p-4" style="background-color: #008080;">
      {{-- <div class="row"> --}}
        {{-- <div class="col-md-3">
          <a href="" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm text-white">Login</a>
        </div> --}}
        <!-- <div class="text-end mt-2">
          <a class="btn btn-custom" href="/register">Register</a>
        </div> -->
      {{-- </div> --}}
    </div>

    @if($errors->has('status'))
      <div class="alert alert-danger">
          {{ $errors->first('status') }}
      </div>
    @endif

    <div class="container-fluid login-section mt-1 mb-1 p-2">
      <div class="row w-100">
        <!-- Left Section -->
        <div class="col-md-7 text-center d-flex flex-column align-items-center justify-content-center">
          <img src="{{asset('images/vc1.jpeg')}}" alt="Conference Illustration" class="img-fluid mt-1 mb-1"
            style="height: 300px; width: 500px ;">
          <div class="text-center">
            <h4>Attendance Monitoring System</h4>
            <p>for Participants of the Video Conference arranged by NIC Himachal Pradesh State and District Centres</p>
          </div>
        </div>

        <!-- Divider -->
        <div class="col-md-1 d-none d-md-flex align-items-center">
          <div style="width: 1px; height: 100%; background-color: #ddd;"></div>
        </div>

        <!-- Right Section -->
        <div class="col-md-4">
          <div class="card login-card p-1">
            <!-- <h2 class="login-title mb-4 p-3 text-white" style="background-color: #008080;">Log In</h2> -->
            <h2 class="login-title mb-1 p-2 text-white"
              style="background-color: #008080; border-radius: 40px; text-align: center;">
              Log In
            </h2>

            <form action="{{ route('login.submit') }}" method="POST" autocomplete="off">
              @csrf
              <div class="mt-1 mb-1">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
              </div>
              <div class="mt-1 mb-1">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
              </div>
              <!-- Math CAPTCHA -->
              <div class="mb-1 mt-1">
                <label for="captcha" class="form-label">
                  <b class="text-danger">{{ __('What is ') . $num1 . ' + ' . $num2 . ' ?' }}</b>
                </label>

                <input type="text" class=" form-control @error('captcha') is-invalid @enderror" id="captcha"
                  name="captcha" placeholder="enter result" required>
                <span class="b-bottom-line"></span>
                @error('captcha')
                  <style>
                  #captcha {
                    border-color: red;
                    /* Red border to indicate error */
                    background-color: #f8d7da;
                    /* Light red background for error */
                  }
                  </style>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-custom ">Log In</button>
                {{-- <a class="btn" style="background-color: #008080;" href="/register">Register</a> --}}
                <a class="btn btn-custom"
                  style="background-color: #008080; border-radius: 50px; padding: 10px 20px; color: white; text-decoration: none;"
                  href="/register">Register
                </a>
                {{-- <a class="btn btn-custom"
                  style="background-color:red; border-radius: 50px; padding: 10px 20px; color: white; text-decoration: none;"
                  href="">Register
                </a> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid p-4">
    <x-footer></x-footer>
    </div>
    <!-- Livewire Scripts -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>

</html>