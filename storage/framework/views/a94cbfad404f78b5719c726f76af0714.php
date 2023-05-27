

<?php $__env->startSection('content'); ?>


  <!-- ================ start banner area ================= -->	
  <section class="blog-banner-area" id="blog">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>Our Blog</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ end banner area ================= -->
  <!--================Blog Area =================-->
  <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-11">
                  <div class="blog_left_sidebar">
                      <article class="row blog_item">
                          <div class="col-md-3">
                              <div class="blog_info text-right">
                                  <ul class="blog_meta list">
                                      <li>
                                          <a href="#">By Admin
                                              <i class="lnr lnr-user"></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#"> <?php echo e($post->created_at->format('Y-m-d')); ?>

                                              <i class="lnr lnr-calendar-full"></i>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">1.2M Views
                                              <i class="lnr lnr-eye"></i>
                                          </a>
                                      </li>
                                  
                                  </ul>
                              </div>
                          </div>
                          <div class="col-md-9">
                              <div class="blog_post">
                              <?php if($post->photo): ?>
                                  <img src="<?php echo e($post->photo); ?>" alt=""style=" width: 600px; height: 500px;">
                              <?php endif; ?>
                                  <div class="blog_details">
                                      <a href="<?php echo e(route('single-blog', $post->id)); ?>">
                                          <h2><?php echo e($post->title); ?></h2>
                                      </a>
                                      <p><?php echo e($post->description); ?>.</p>
                                      <a class="button button-blog" href="<?php echo e(route('single-blog', $post->id)); ?>">View More</a>
                                  </div>
                              </div>
                          </div>
                      </article>
   
     
                  </div>
              </div>
          </div>
      </div>
  </section>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <!--================Blog Area =================-->


  <?php $__env->stopSection(); ?>
  
  <?php $__env->startSection('footer'); ?>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/blog.blade.php ENDPATH**/ ?>