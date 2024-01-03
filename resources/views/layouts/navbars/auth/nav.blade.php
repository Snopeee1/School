<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
            <h4 class="font-weight-bolder mb-0 text-capitalize"> <i class="fas fa-user-circle"></i> / {{ Auth::user()->name }}</h4>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fas fa-power-off"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
