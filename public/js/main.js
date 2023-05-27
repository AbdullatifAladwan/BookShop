$('.edit-user').on('click', function() {
  $('#edituser').modal('show');
});
$(document).ready(function() {
  // Add click event listener to the "Comment" button
  $('#commentButton').on('click', function(e) {
    e.preventDefault();

    // Get form data
    var userId = $('#user_id').val();
    var postId = $('#post_id').val();
    var comment = $('#comment').val();
    var _token = $('#_token').val();

    // Send AJAX request
    $.ajax({
      url: '/comments', // Change this URL to the appropriate route for your controller
      type: 'POST',
      data: {
        _token: _token,
        user_id: userId,
        post_id: postId,
        comment: comment
      },
      success: function(response) {
        // Handle success response and append comment data
        var username = response.username; // Assuming the username is returned in the response
        var userPhoto = response.userphoto; // Assuming the user's photo is returned in the response
        var comment = response.comment; // Assuming the comment is returned in the response

        // Append comment data to the comment-list div
        var commentHtml = `
        </br>
          <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
              <div class="thumb">
                <img src="${userPhoto}" alt="${username}">
              </div>
              <div class="desc">
                <h5>${username}</h5>
                </br>
                <p class="comment">${comment}</p>
              </div>
            </div>
           
          </div>
        `;
        $('.comment-list').append(commentHtml);
      },
      error: function(error) {
        // Handle error response
        console.error(error);
      }
    });
  });
});

$(function() {
  "use strict";

  //------- Parallax -------//
  skrollr.init({
    forceHeight: false
  });

  //------- Active Nice Select --------//
  $('select').niceSelect();

  //------- hero carousel -------//
  $(".hero-carousel").owlCarousel({
    items:3,
    margin: 10,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:false,
    dots:false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items: 2
      },
      810:{
        items:3
      }
    }
  });

  //------- Best Seller Carousel -------//
  if($('.owl-carousel').length > 0){
    $('#bestSellerCarousel').owlCarousel({
      loop:true,
      margin:30,
      nav:true,
      navText: ["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
      dots: false,
      responsive:{
        0:{
          items:1
        },
        600:{
          items: 2
        },
        900:{
          items:3
        },
        1130:{
          items:4
        }
      }
    })
  }

  //------- single product area carousel -------//
  $(".s_Product_carousel").owlCarousel({
    items:1,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:false,
    dots:false
  });

  //------- mailchimp --------//  
	function mailChimp() {
		$('#mc_embed_signup').find('form').ajaxChimp();
	}
  mailChimp();
  
  //------- fixed navbar --------//  
  $(window).scroll(function(){
    var sticky = $('.header_area'),
    scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });

  //------- Price Range slider -------//
  if(document.getElementById("price-range")){
  
    var nonLinearSlider = document.getElementById('price-range');
    
    noUiSlider.create(nonLinearSlider, {
        connect: true,
        behaviour: 'tap',
        start: [ 500, 4000 ],
        range: {
            // Starting at 500, step the value by 500,
            // until 4000 is reached. From there, step by 1000.
            'min': [ 0 ],
            '10%': [ 500, 500 ],
            '50%': [ 4000, 1000 ],
            'max': [ 10000 ]
        }
    });
  
  
    var nodes = [
        document.getElementById('lower-value'), // 0
        document.getElementById('upper-value')  // 1
    ];
  
    // Display the slider value and how far the handle moved
    // from the left edge of the slider.
    nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
        nodes[handle].innerHTML = values[handle];
    });
  
  }
  
});


