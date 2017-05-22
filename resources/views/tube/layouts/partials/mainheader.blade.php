<header>

        <section id="navBar">
            <nav class="sticky-container" data-sticky-container>
                <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                                <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                                <div class="title-bar-title"><img src="{{ asset('images/logo-small.png')}}" alt="logo"></div>
                            </div>

                            <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                                <div class="top-bar-left">
                                    <ul class="menu">
                                        <li class="menu-text">
                                            <a href="{{url('home')}}"><img src="{{ asset('images/logo.png')}}" alt="logo"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top-bar-right search-btn">
                                    <ul class="menu">
                                        <li class="search">
                                            <i class="fa fa-search"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top-button top-bar-right">

                                    <ul class="menu float-right">
                                      @if (Auth::guest())

                                      <li class="dropdown-login">
                                          <a class="loginReg" data-toggle="example-dropdown"   style="padding-left:10px;background-color:transparent" href="#"><i class="fa fa-user"></i>login</a>
                                          <div class="login-form">
                                              <h6 class="text-center">Great to have you back!</h6>
                                              <form action="{{ url('/login') }}" method="post">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <div class="input-group">
                                                      <span class="input-group-label"><i class="fa fa-user"></i></span>
                                                      <input class="input-group-field" type="text" placeholder="Enter username">
                                                      <input type="email" class="input-group-field" placeholder="Enter your email" name="email"/>
                                                  </div>
                                                  <div class="input-group">
                                                      <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                                      <input type="password" class="input-group-field" placeholder="Enter password" name="password"/>
                                                  </div>
                                                  <div class="checkbox">
                                                    <input id="check1" type="checkbox" value="check" name="remember">
                                                      <label class="customLabel" for="check1">Remember me</label>
                                                  </div>
                                                  <input type="submit" name="submit" value="Login Now">
                                              </form>
                                              <p class="text-center">New here? <a class="newaccount" href="./register">Create a new Account</a></p>
                                          </div>
                                      </li>
                                      @else
                                      <li style="padding-left:10px;background-color:transparent">{{ Auth::user()->name }} <a style="background-color:transparent" href="{{ url('/logout') }}">Salir</a></li>
                                      @endif


                                    </ul>
                                </div>
                                <div class="top-bar-right">
                                    <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                        <li class="has-submenu active">
                                            <a href="#"><i class="fa fa-home"></i>Home</a>
                                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                <li><a href="home-v1.html"><i class="fa fa-home"></i>Home page v1</a></li>
                                                <li><a href="home-v2.html"><i class="fa fa-home"></i>Home page v2</a></li>
                                                <li><a href="home-v3.html"><i class="fa fa-home"></i>Home page v3</a></li>
                                                <li><a href="home-v4.html"><i class="fa fa-home"></i>Home page v4</a></li>
                                                <li><a href="home-v5.html"><i class="fa fa-home"></i>Home page v5</a></li>
                                                <li><a href="home-v6.html"><i class="fa fa-home"></i>Home page v6</a></li>
                                                <li><a href="home-v7.html"><i class="fa fa-home"></i>Home page v7</a></li>
                                                <li><a href="home-v8.html"><i class="fa fa-home"></i>Home page v8</a></li>
                                                <li><a href="home-v9.html"><i class="fa fa-home"></i>Home page v9</a></li>
                                                <li><a href="home-v10.html"><i class="fa fa-home"></i>Home page v10</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-submenu" data-dropdown-menu="example1">
                                            <a href="#"><i class="fa fa-film"></i>Videos</a>
                                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                <li><a href="single-video-v1.html"><i class="fa fa-film"></i>single video v1</a></li>
                                                <li><a href="single-video-v2.html"><i class="fa fa-film"></i>single video v2</a></li>
                                                <li><a href="single-video-v3.html"><i class="fa fa-film"></i>single video v3</a></li>
                                                <li><a href="submit-post.html"><i class="fa fa-film"></i>submit post</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li>
                                        <li>
                                            <a href="blog.html"><i class="fa fa-edit"></i>blog</a>
                                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                <li><a href="blog-single-post.html"><i class="fa fa-edit"></i>blog single post</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-magic"></i>features</a>
                                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                <li><a href="404.html"><i class="fa fa-magic"></i>404 Page</a></li>
                                                <li><a href="archives.html"><i class="fa fa-magic"></i>Archives</a></li>
                                                <li><a href="login.html"><i class="fa fa-magic"></i>login</a></li>
                                                <li><a href="login-forgot-pass.html"><i class="fa fa-magic"></i>Forgot Password</a></li>
                                                <li><a href="login-register.html"><i class="fa fa-magic"></i>Register</a></li>
                                                <li>
                                                    <a href="#"><i class="fa fa-magic"></i>profile</a>
                                                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                        <li><a href="profile-page-v1.html"><i class="fa fa-magic"></i>profile v1</a></li>
                                                        <li><a href="profile-page-v2.html"><i class="fa fa-magic"></i>profile v2</a></li>
                                                        <li><a href="profile-about-me.html"><i class="fa fa-magic"></i>Profile About Me</a></li>
                                                        <li><a href="profile-comments.html"><i class="fa fa-magic"></i>profile comments</a></li>
                                                        <li><a href="profile-favorite.html"><i class="fa fa-magic"></i>profile favorites</a></li>
                                                        <li><a href="profile-followers.html"><i class="fa fa-magic"></i>profile followers</a></li>
                                                        <li><a href="profile-settings.html"><i class="fa fa-magic"></i>profile settings</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="profile-video.html"><i class="fa fa-magic"></i>Author Page</a></li>
                                                <li><a href="search-results.html"><i class="fa fa-magic"></i>search results</a></li>
                                                <li><a href="terms-condition.html"><i class="fa fa-magic"></i>Terms &amp; Condition</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url('/home/about-us')}}"><i class="fa fa-user"></i>about</a></li>
                                        <li><a href="contact-us.html"><i class="fa fa-envelope"></i>contact</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="search-bar" class="clearfix search-bar-light">
                        <form method="post">
                            <div class="search-input float-left">
                                <input type="search" name="search" placeholder="Seach Here your video">
                            </div>
                            <div class="search-btn float-right text-right">
                                <button class="button" name="search" type="submit">search now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </section>
    </header><!-- End Header -->
