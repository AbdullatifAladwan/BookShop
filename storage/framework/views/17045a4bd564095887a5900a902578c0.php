

<?php $__env->startSection('content'); ?>

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shop Single</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


  <!--================Single Product Area =================-->
 
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo e($product->photo); ?> " alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo e($product->name); ?></h3>
						<h2>$<?php echo e($product->price); ?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : <?php echo e($product->categories->name); ?></a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<p><?php echo e($product->description); ?></p>
						<div class="product_count">
              <label for="qty">Quantity:</label>
              <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="ti-angle-left"></i></button>
							<input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
               class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
			   <a class="button primary-btn" href="#" onclick="addToCart('<?php echo e($product->name); ?>', <?php echo e($product->price); ?>)">Add to Cart</a>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->

<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function addToCart(name, price) {
    var quantity = $('#sst').val();

    // AJAX request to save the data in a session
    $.ajax({
      url: '/add-to-cart',
      type: 'POST',
      data: {
        _token: '<?php echo e(csrf_token()); ?>',
        name: name,
        quantity: quantity,
        price: price
      },
      success: function(response) {
        alert('Product added to cart successfully.');
      },
      error: function(xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/single-product.blade.php ENDPATH**/ ?>