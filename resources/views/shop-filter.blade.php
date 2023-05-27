@extends('layouts.app')

@section('content')

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
              <form id="filterForm" action="{{ route('filter', ['id' => ':id']) }}" method="get">
    <ul>
        @foreach ($categories as $cat)
        <li class="filter-list">
            <input class="pixel-radio" type="radio" id="{{ $cat->name }}" name="id" value="{{ $cat->id }}">
            <label for="{{ $cat->name }}">
                {{ $cat->name }}<span> ({{ $cat->products_count }})</span>
            </label>
        </li>
        @endforeach
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
            @foreach ($product as $pro)
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="{{ $pro->photo }} " alt="">
                  </div>
                  <div class="card-body">
                    <p>{{ $pro->categories->name }}</p>
                    <h4 class="card-product__title"><a href="{{ route('single-product', $pro->id) }}">{{ $pro->name }}</a></h4>
                    <p class="card-product__price">${{ $pro->price }}</p>
                  </div>
                </div>
              </div>
              @endforeach
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

@endsection
  
@section('footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.pixel-radio').on('click', function() {
            var categoryId = $(this).val();
            var formAction = '{{ route("filter", [":id"]) }}';
            formAction = formAction.replace(':id', categoryId);
            $('#filterForm').attr('action', formAction);
            $('#filterForm').submit();
        });
    });
</script>
@include('layouts.footer')
@endsection