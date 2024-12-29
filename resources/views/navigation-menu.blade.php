<nav class="navbar navbar-expand-lg mb-3" style="background-color: #008080;">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">
      {{-- {{ Auth::user()->userrole == 0 ? 'State Admin - '.Auth::user()->name : (Auth::user()->userrole == 1 ? 'Office Admin - '. Auth::user()->name : (Auth::user()->userrole == 2 ? 'FMS User - '.)) }} --}}
      {{ Auth::user()->userrole == 0 ? 'State Admin - '.Auth::user()->name : (Auth::user()->userrole == 1 ? 'Office Admin - '. Auth::user()->name : (Auth::user()->userrole == 2 ? 'FMS User - '.Auth::user()->name : ''))}}
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @if (Auth::user()->userrole == 0)
          {{-- <li class="nav-item"><a class="nav-link text-white" href="/usermanagement">User Management</a></li> --}}
          {{-- <li class="nav-item"><a class="nav-link text-white" href="#">View Participants Data</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Print Participants Data</a></li> --}}
        @elseif (Auth::user()->userrole == 1)
          <li class="nav-item"><a class="nav-link text-white" href="#">View Participants Data</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Print Participants Data</a></li>
        @else
          <li class="nav-item"><a class="nav-link text-white" href="#">Add VC</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Add Participants</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">View Participants Data</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Print Participants Data</a></li>
        @endif
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-sm btn-danger rounded-pill mt-1 mb-1 p-2" type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>