<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Welcome</title>
  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/base-responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
</head>

<body>
  <div class="container clearfix" id="b-header">
    <div class="float-left d-flex">
      <img src="images/emblem.svg" alt="National Emblem of India logo" class="align-self-center" style="width: 60px">
    </div>

    <div class="float-left d-flex h-100">
      <b class="align-self-center pl-3">
        <span style="font-size: 24px;">VMS-NIC</span><br>
        <span style="font-size: 16px;"> Video Conference Participants Attendance Monitoring System</span> 
      </b>
    </div>

    <div class="float-right d-flex h-100">
      <span class="align-self-center font-weight-bold" style="font-size:15px; text-align:right;">
        NATIONAL INFORMATICS CENTRE <br>
        <span>Ministry of Electronics & IT</span><br>
        <span>Government of India</span>
      </span>
      <b class="align-self-center pl-3">
        <span><img src="{{asset('images/NIC.png')}}" alt="NIC logo" style="width: 120px; height: 50px;"></span>
      </b>
    </div>
  </div>

  <!-- Global Navigation -->
  <div class="b-global-nav">
    <div class="container">
      <nav class="navbar navbar-expand-sm navbar-dark px-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav main-menu d-flex">
            <li class="nav-item d-block"> <a href="#" class="nav-link active">Login</a> </li>
            <!-- <li class="nav-item d-block ml-auto"><a href="#">Contact Us</a></li>
						<li class="nav-item d-block b-login">
							<a class="nav-link" href="#">Help</a>
						</li>     -->
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <div class="container my-5">
    <div class="row">

      <div class="col-lg-6 ">
        <img src="images/vc.png" alt="NIC logo" style="width: 550px; height: 300px;">
        <h4 class="align-self-center text-right px-4 b-app-info">Attendance Monitoring System for Participants of the
          Video Conference arranged by NIC Himachal Predesh State and District Centres
        </h4>
      </div>

      <div class="col-lg-6 px-5 b-login-form" style="border-left: 1px solid #999;">
        <!-- Modal Header -->
        <div class="d-block py-5 border-bottom-0">
          <h3 style="color: #FB9B00; border-bottom: 3px solid #F89B00;" class="pb-2">Log In</h3>
        </div>

        <!-- Modal body -->
        <div>
          <form action="{{ route('login.submit') }}" method="POST" autocomplete="off">
            @csrf <!-- Add CSRF Token for security -->
            <div class="form-group">
              <label for="login-email"><b>Email:</b></label>
              <input type="email" class="form-control" id="login-email" placeholder="Enter email" name="email" required>
              <span class="b-bottom-line"></span>
            </div>
            <div class="form-group">
              <label for="login-pwd"><b>Password:</b></label>
              <input type="password" class="form-control" id="login-pwd" placeholder="Enter password" name="password"
                required>
              <span class="b-bottom-line"></span>
            </div>

            <!-- Math CAPTCHA -->
            <div class="mb-2 mt-2">
              <label for="captcha" class="form-label">
                <b>{{ __('What is ') . $num1 . ' + ' . $num2 . '?' }}</b>
              </label>

              <input type="text" class=" form-control @error('captcha') is-invalid @enderror" id="captcha"
                name="captcha" placeholder="enter captcha" required>
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

            <div class="py-4">
              <button type="submit" class="btn btn-primary rounded-pill">Log In</button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>

  <!----------- Footer ------------>
  <div class="footer-bs">
    <footer class="container">
      <div class="row">

        <div class="col-md-3 footer-social animated fadeInDown d-flex">
          <span class="bg-light mr-3">
            <img src="images/nic-logo.svg" alt="NIC logo" width="50px">
          </span>
          <span class="bg-light d-flex">
            <img src="images/digital-india-logo.svg" alt="Digital India logo" width="80px" class="align-self-center">
          </span>
        </div>
        <!-- <div class="col-md-2 footer-ns animated fadeInRight d-flex">
	        			<div class="backtotop align-self-center d-flex text-center" href="#b-accessibility" id="backtotop">
		            		<i style="font-size: 24px;" class="fas fa-angle-up align-self-center mx-auto"></i>
		            	</div>
	            </div> -->

        <div class="row col-md-9 footer-nav animated fadeInUp d-flex">
          <div class="align-self-center">
            <h6>
              Content Managed by <a class="text-light font-weight-bold" target="_Blank" href="https://hpkullu.nic.in/">
                National Informatics Centre - Kullu (HP).</a>, <a class="text-light font-weight-bold"
                href="https://meity.gov.in/" target="_Blank">Ministry of Electronics and IT</a>, <a
                class="text-light font-weight-bold" href="https://www.india.gov.in/" target="_Blank">Govt. of India.</a>
            </h6>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- <br><br><br><br><br><br><br><br><br> -->
  <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
		<a class="navbar-brand" href="#">Logo</a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
		</ul>
	</nav> -->

  <!-- <div class="d-flex" id="wrapper"> -->

  <!-- Sidebar -->
  <!-- <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div> -->
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <!-- <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
      </div>
    </div> -->
  <!-- /#page-content-wrapper -->

  <!-- </div> -->
  <!-- /#wrapper -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <script>
    $(document).ready(function () {
      $('#backtotop').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
      });
    });
  </script>
</body>

</html>