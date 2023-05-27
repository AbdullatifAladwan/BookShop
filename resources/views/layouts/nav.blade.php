 <!--================ Start Header Menu Area =================-->
 <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="{{route('home') }}"> <img src="img/logo.png" alt="" style="width: 160px; height: 80px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{route('home') }}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route ('shop')}}">Shop</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route ('blog')}}">Blog</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('Contact') }}">Contact</a></li>
            </ul>
            @auth
            <ul class="nav-shop">
            <li class="nav-item">
            <a href="{{ route('cart') }}">
              <button>
                <i class="ti-shopping-cart"></i>
                <span class="nav-shop__circle">{{ count(Session::get('cartItems', [])) }}</span>
              </button>
            </a>
           </li>
              <li class="nav-item"><a class="button button-header" href="{{route ('shop')}}">Buy Now</a></li>
              <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item "><a class="nav-link edit-user" href="javascript:void(0);">Edit profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out
                            </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>               
                         </ul>
                </li>
            </ul>
            @endauth
            @guest 
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item "><a class="nav-link" href="{{ route('login') }}">Sign in</a></li>
            </ul>
            @endguest
        </div>
        </div>
      </nav>
    </div>
  </header>
  
	<!--================ End Header Menu Area =================-->