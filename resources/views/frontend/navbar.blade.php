<body>
    <div id="wrapper">
      <!-- toggle top area -->
      <div class="hidden-top">
        <div class="hidden-top-inner container">
          <div class="row">
            <div class="span12">
              <ul>
                <li><strong>We are available for any custom works this month</strong></li>
                <li>Main office: Springville center X264, Park Ave S.01</li>
                <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end toggle top area -->
      <!-- start header -->
      <header>
        <div class="container ">
          <!-- hidden top area toggle link -->
          <div id="header-hidden-link">
            <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
          </div>
          <!-- end toggle link -->
          <div class="row nomargin">
            <div class="span12">
              <div class="headnav">
                <ul>
                  {{-- <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li> --}}
                  <li><a href="{{route('login')}}" data-toggle="modal">Sign in</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="row">
            <div class="span4">
              <div class="logo">
                <a href="{{ url('')}}"><img src="{{ asset('img/logo.jpg')}}" alt=""/></a>
                <!-- <h1 ="center">Mengatasi Semuah Masalah Rambut</h1> -->
              </div>
            </div>
            <div class="span8">
              <div class="navbar navbar-static-top">
                <div class="navigation">
                  <nav>
                    <ul class="nav topnav">
                      <li class="dropdown active">
                        <a href="index.html">Home <i class="icon-angle-down"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#about-us">About Us</a>

                      </li>
                      <li class="dropdown">
                        <a href="#products">Products</a>
                      </li>
                      <li class="dropdown">
                          <a href="#clients">Clients</a>
                      </li>
                      <li class="dropdown">
                        <a href="#contacts">Contact </a>
                      </li>
                        <li class="dropdown">
                          <a href="#">Blog</a>
                        </li>
                    </ul>
                  </nav>
                </div>
                <!-- end navigation -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- end header -->
