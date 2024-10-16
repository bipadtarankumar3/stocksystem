<header class="top-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{ URL::to('public/assets/web/images/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                {{-- <li class="nav-item active">
                  <a class="nav-link sliding-link" href="#">Rooms</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link sliding-link" href="{{URL::To('tours')}}">Tours</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link sliding-link" href="{{URL::To('expriences')}}">Experiences</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link sliding-link" href="#">Cabs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link sliding-link" href="#">Destinations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link sliding-link" href="#">Support</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link sliding-link" href="#"><span>Become Tourbix</span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  