<?php $__env->startSection('content'); ?>

    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/home/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shop is fun</h4>
              <h1>Browse Our Premium Books</h1>
              <p>Welcome to Bookshop , your online destination for all things books! Whether you're a bookworm, a casual reader, or someone looking for the perfect gift, you've come to the right place.</p>
              <a class="button button-hero" href="<?php echo e(route ('shop')); ?>">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Trending <span class="section-intro__style">Book</span></h2>
        </div>
      
        <div class="row">
        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-6 col-lg-4 col-xl-3" style="max-width: 300px;">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="<?php echo e($pro->photo); ?> "alt="" style="height: 400px;">
              </div>
              <div class="card-body">
                <p><?php echo e($pro->categories->name); ?></p>
                <h4 class="card-product__title"><a href="<?php echo e(route('single-product', $pro->id)); ?>"><?php echo e($pro->name); ?></a></h4>
                <p class="card-product__price"><?php echo e($pro->price); ?> $</p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       
      </div>
    </section>
    <!-- ================ trending product section end ================= -->  


    <!-- ================ offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Up To 50% Off</h3>
              <p>In addition to our extensive book selection, we are committed to providing exceptional customer service. Our team is passionate about books and is always ready to assist you with any inquiries or recommendations. We offer secure and convenient online shopping, with multiple payment options and fast shipping to your doorstep. </p>
              <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= --> 


    <!-- ================ Blog section start ================= -->  
    <section class="blog">
      <div class="container">
        <div class="section-intro pb-60px">
        
          <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row">
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
              <?php if($post->photo): ?>
                <img class="card-img rounded-0" src="<?php echo e($post->photo); ?>" alt="" style="height: 400px;">
              <?php endif; ?>
              </div>
              <div class="card-body">
                <h4 class="card-blog__title"><a href="<?php echo e(route('single-blog', $post->id)); ?>" style="margin-left: 150px;"><?php echo e($post->title); ?></a></h4>
                <p style="    margin-left: 15px;"><?php echo e($post->description); ?>.</p>
                <a class="card-blog__link" href="<?php echo e(route('single-blog', $post->id)); ?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </div>
      </div>
    </section>
    <!-- ================ Blog section end ================= -->  
     <!-- ================ Subscribe section start ================= --> 
     <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Get Book From Anywhere</h3>
          <p>At Bookshop  we offer a wide range of books for all ages and interests. From bestselling novels to classic literature, from non-fiction to children's books, our carefully curated collection has something for everyone. Our team of book enthusiasts hand-picks each title, ensuring that you'll find quality reads that will captivate your imagination and enrich your mind.</p>
         
          
        </div>
      </div>
    </section>
    
    <!-- ================ Subscribe section end ================= --> 

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/home.blade.php ENDPATH**/ ?>