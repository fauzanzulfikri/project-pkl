@if (auth()->check() && auth()->user()->level === 'admin')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="/user/profile" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('assets/images/user/'.Auth()->User()->foto)}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth()->User()->nama}}</span>
            <span class="text-secondary text-small">{{Auth()->User()->level}}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Kelola Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/user">Data User</a></li>
            <li class="nav-item"> <a class="nav-link" href="/komputer">Data Komputer</a></li>
            <li class="nav-item"> <a class="nav-link" href="/laporank">Data Laporan Kerusakan</a>
            
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
  @else
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="/user/profile" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('assets/images/user/'.Auth()->User()->foto)}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth()->User()->nama}}</span>
            <span class="text-secondary text-small">{{Auth()->User()->level}}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Kelola Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/komputer">Data Komputer</a></li>
            <li class="nav-item"> <a class="nav-link" href="/laporank">Data Laporan Kerusakan</a>
            
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
@endif