 <!--================ Start Header Menu Area =================-->
 <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="<?php echo e(route('home')); ?>"> <img src="img/logo.png" alt="" style="width: 160px; height: 80px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(route ('shop')); ?>">Shop</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(route ('blog')); ?>">Blog</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(route('Contact')); ?>">Contact</a></li>
            </ul>
            <?php if(auth()->guard()->check()): ?>
            <ul class="nav-shop">
            <li class="nav-item">
            <a href="<?php echo e(route('cart')); ?>">
              <button>
                <i class="ti-shopping-cart"></i>
                <span class="nav-shop__circle"><?php echo e(count(Session::get('cartItems', []))); ?></span>
              </button>
            </a>
           </li>
              <li class="nav-item"><a class="button button-header" href="<?php echo e(route ('shop')); ?>">Buy Now</a></li>
              <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(auth()->user()->name); ?></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item "><a class="nav-link edit-user" href="javascript:void(0);">Edit profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out
                            </a></li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>               
                         </ul>
                </li>
            </ul>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?> 
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item "><a class="nav-link" href="<?php echo e(route('login')); ?>">Sign in</a></li>
            </ul>
            <?php endif; ?>
        </div>
        </div>
      </nav>
    </div>
  </header>
  
	<!--================ End Header Menu Area =================--><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/layouts/nav.blade.php ENDPATH**/ ?>