


<?php $__env->startSection('content'); ?>
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Checkout</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container">
    <?php if(session('success')): ?>
          <h3 style="text-align: center;"> <?php echo e(session('success')); ?></h1>
    <?php else: ?>
    
        <div class="billing_details">
            <div class="row">
            <form class="row contact_form" action="<?php echo e(route('stripe.payment')); ?>" method="post">
    <div class="col-lg-8">
        <h3>Billing Details</h3>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="first" name="name" value="<?php echo e(auth()->user()->name); ?>" readonly>
        </div>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" readonly>
        </div>
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" id="Loction" name="Loction" placeholder="Location">
        </div>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="number" name="number" placeholder="Phone number">
        </div>
        <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" id="add1" name="add1" placeholder="Address line">
        </div>
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
        </div>
        <div class="col-md-12 form-group mb-0">
            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="order_box">
            <h2>Your Order</h2>
            <ul class="list">
                <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                <?php $__currentLoopData = Session::get('cartItems', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#">
                            <?php echo e($item['name']); ?>

                            <span class="middle">x <?php echo e($item['quantity']); ?></span>
                            <span class="last">$<?php echo e($item['quantity'] * $item['price']); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <ul class="list list_2">
                <li><a href="#">Total <span>$<?php echo e(Session::get('subtotal')); ?></span></a></li>
            </ul>
            <div class="payment_item" style="margin-left: 30px;">
                <?php echo csrf_field(); ?>
                <script
                    src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button"
                    data-key="<?php echo e(config('services.stripe.publishable')); ?>"
                    data-amount="<?php echo e(Session::get('subtotal') * 100); ?>"
                    data-name=""
                    data-description=""
                    data-locale="auto"
                    data-currency="usd"
                ></script>
            </div>
        </div>
    </div>
</form>

                    </div>

                    
                       
                    </div>
                </div>

    <?php endif; ?>
            </div>
        </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!--================Blog Area =================-->


  <?php $__env->stopSection(); ?>
  
  <?php $__env->startSection('footer'); ?>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\Book\resources\views/checkout.blade.php ENDPATH**/ ?>