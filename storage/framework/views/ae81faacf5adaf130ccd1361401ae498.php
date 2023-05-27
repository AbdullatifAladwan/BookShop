

<?php $__env->startSection('content'); ?>

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shop Category</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
            
              <form id="filterForm" action="<?php echo e(route('filter', ['id' => ':id'])); ?>" method="get">
    <ul>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="filter-list">
            <input class="pixel-radio" type="radio" id="<?php echo e($cat->name); ?>" name="id" value="<?php echo e($cat->id); ?>">
            <label for="<?php echo e($cat->name); ?>">
                <?php echo e($cat->name); ?><span> (<?php echo e($cat->products_count); ?>)</span>
            </label>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</form>
              </li>
            </ul>
          </div>
       
        </div>
        <div class="col-xl-8 col-lg-8 col-md-7">
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="<?php echo e($pro->photo); ?> " alt="">
                  </div>
                  <div class="card-body">
                    <p><?php echo e($pro->categories->name); ?></p>
                    <h4 class="card-product__title"><a href="<?php echo e(route('single-product', $pro->id)); ?>"><?php echo e($pro->name); ?></a></h4>
                    <p class="card-product__price">$<?php echo e($pro->price); ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->		  

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.pixel-radio').on('click', function() {
            var categoryId = $(this).val();
            var formAction = '<?php echo e(route("filter", [":id"])); ?>';
            formAction = formAction.replace(':id', categoryId);
            $('#filterForm').attr('action', formAction);
            $('#filterForm').submit();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/shop.blade.php ENDPATH**/ ?>