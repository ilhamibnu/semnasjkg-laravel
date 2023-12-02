 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top">
     <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

         <a href="/" class="logo d-flex align-items-center">
             <img src="{{ asset('landing/logo/logo-semnas-2.png') }}" alt="">
             <!--<span>Semnas JKG</span>-->
         </a>

         <nav id="navbar" class="navbar">
             <ul>
                 <!--<li><a class="nav-link scrollto active" href="/#hero">Home</a></li>-->
                 <!--<li><a class="nav-link scrollto" href="/#about">About</a></li>-->
                 <!--<li><a class="nav-link scrollto" href="/#services">Services</a></li>-->
                 <!--<li><a class="nav-link scrollto" href="/#portfolio">Portfolio</a></li>-->
                 <!--<li><a class="nav-link scrollto" href="/#team">Team</a></li>-->
                 <!--<li><a class="nav-link scrollto" href="/#recent-blog-posts">Blog</a></li>-->
                 <!--<li><a class="nav-link scrollto" href="/#contact">Contact</a></li>-->
                 @if(Auth::user() == null)
                 <li><a class="btn getstarted scrollto" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login / Register</a></li>
                 @else
                 <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                     <ul>
                         <li><a href="/seminar">Seminar</a></li>
                         <li><a href="/lomba">Lomba</a></li>
                         <li><a href="/profil">Profil</a></li>
                         <li><a href="/logout">Logout</a></li>
                     </ul>
                 </li>
                 @endif
             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

     </div>
 </header><!-- End Header -->
