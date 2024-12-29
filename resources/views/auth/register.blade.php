<x-starthtml></x-starthtml>
<x-header></x-header>
<!-- @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
  @endif -->
<!-- @if (Session::has('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
  </div>
@endif -->
<div class="container-fluid p-4" style="background-color: #008080;">
  <div class="row">
  </div>
</div>

<div class="container-fluid">

  <!-- <div class="container-fluid">
      <a class="navbar-brand text-white shadow" href="{{url('/')}}">
        <h3>VC Participants Attendance Monitoring System</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="mx-2">
        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Log in</a>
      </div>
    </div> -->

  <div class="row justify-content-center mt-5">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header  text-white text-center" style="background-color: #008080;">
          <h5 class="card-title">Register New User</h5>
        </div>
        <div class="card-body">
          @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
        </div>
      @endif
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3 mt-1 mb-1">
                  <label for="statecode" class="form-label text-success mb-1">State Name</label>
                  <select name="statecode" id="state-list" class="form-select">
                    <option value="">Select State</option>
                    @foreach ($states as $state)
            <option value="{{$state['statecode']}}">{{$state['statename']}}</option>
          @endforeach
                  </select>
                  <span class="text-danger">
                    @error('statecode')
            {{ $message }}
          @enderror
                  </span>
                </div>

                <div class="col-md-3 mt-1 mb-1">
                  <label for="districtcode" class="form-label text-success mb-1">District Name</label>
                  <select name="districtcode" id="district-list" class="form-select">
                    <option value="">Select District</option>
                  </select>
                  <span class="text-danger">
                    @error('districtcode')
            {{ $message }}
          @enderror
                  </span>
                </div>

                <div class="col-md-3 mb-1">
                  <label for="officecode" class="form-label text-success mb-1">Office Name</label>
                  <select name="officecode" id="" class="form-select">
                    <option value="">Select Office</option>
                    @foreach ($offices as $office)
            <option value="{{$office['officecode']}}">{{$office['officename']}}</option>
          @endforeach
                  </select>
                  <span class="text-danger">
                    @error('officecode')
            {{ $message }}
          @enderror
                  </span>
                </div>
                <div class="col-md-3 mb-1">
                  <label for="usertypecode" class="form-label text-success mb-1">User Type</label>
                  <select name="usertypecode" id="" class="form-select">
                    <option value="">Select User Type</option>
                    @foreach ($userTypes as $usertype)
            <option value="{{$usertype['usertypecode']}}">{{$usertype['usertypename']}}</option>
          @endforeach
                  </select>
                  <span class="text-danger">
                    @error('usertypecode')
            {{ $message }}
          @enderror
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3 mt-1 mb-1">
                  <label for="name" class="form-label text-success">Name</label>
                  <input type="text" value="{{ old('name')}}" name="name"
                    class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
                  <span class="text-danger">
                    @error('name')
            {{ $message }}
          @enderror
                  </span>
                </div>
                <div class="col-md-3 mt-1 mb-1">
                  <label for="email" class="form-label text-success">Email address</label>
                  <input type="text" value="{{ old('email')}}" name="email"
                    class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                  <span class="text-danger">
                    @error('email')
            {{ $message }}
          @enderror
                  </span>
                </div>
                <div class="col-md-3 mt-1 mb-1">
                  <label for="password" class="form-label text-success">Password</label>
                  <input type="password" value="{{ old('password')}}" name="password"
                    class="form-control @error('password') is-invalid @enderror" id="password">
                  <span class="text-danger">
                    @error('password')
            {{ $message }}
          @enderror
                  </span>
                </div>
                <div class="col-md-3 mt-1 mb-1">
                  <label for="password_confirmation" class="form-label text-success">Confirm Password</label>
                  <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror">
                  <span class="text-danger">
                    @error('password_confirmation')
            {{ $message }}
          @enderror
                  </span>
                </div>
              </div>
            </div>
            <div class="mt-3 mb-1">
              <div class="text-center">
                <button class="btn btn-success">Register</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="/" class="btn btn-danger">Back</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <footer class="fixed-bottom">
      <div class="bg-dark text-white text-center p-2">Developed by: NIC Kullu (HP)</div>
    </footer>
  </div>
</div>
<x-footer></x-footer>
<x-endhtml></x-endhtml>