  <!-- Navbar Start -->
  <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
          <div class="col-lg-6 px-5 text-start">
              <small><i class="fa fa-map-marker-alt me-2"></i>Jurusan Kesehatan Gigi Poltekkes Surabaya</small>
              <small class="ms-4"><i class="fa fa-envelope me-2"></i>himakepgi@gmail.com</small>
          </div>
          <div class="col-lg-6 px-5 text-end">
              <small>Follow us:</small>
              <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
              <a class="text-white-50 ms-3" href=""><i class="fab fa-twitter"></i></a>
              <a class="text-white-50 ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
              <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
          </div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
          <a href="/" class="navbar-brand ms-4 ms-lg-0">
              <h1 class="fw-bold text-primary m-0">
                  <img src="https://www.semnasjkgsby.com/user/images/logo-nav.png" alt="logo" class="img-fluid">
              </h1>
          </a>
          <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>

          @if(Auth::user() == null)
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav ms-auto p-4 p-lg-0">
                  <div class="nav-item dropdown">
                      <a href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn btn-outline-primary py-2 px-3">Login / Register <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                              <i class="fa fa-arrow-right"></i>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          @else

          <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav ms-auto p-4 p-lg-0">
                  <div class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                      <div class="dropdown-menu m-0">
                          {{-- <a href="/" class="dropdown-item">Home</a> --}}
                          <a href="/seminar" class="dropdown-item">Seminar</a>
                          <a href="/logout" class="dropdown-item">Logout</a>
                          {{-- <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                          <a href="404.html" class="dropdown-item">404 Page</a> --}}
                      </div>
                  </div>
              </div>
          </div>
          @endif

      </nav>
  </div>
  <!-- Navbar End -->
