$(document).ready(function () {
	
	"use strict"
	
	$('#slider-carousel').carouFredSel({

		responsive:true,
		width:'100%',
		circular:true,
		scroll:
		{
			item:1,
			duration:500,
			pauseOnHover:true
		},

		auto:true,
		items:
		{
			visible:{min:1,max:1},
			height:"variable"
		},
		pagination:
		{
			container:".sliderpager",
			anchorBuilder:false
		}

	});


	$('.portfolio-carousel').carouFredSel({

		responsive:true,
		width:'100%',
		circular:true,
		prev:'#prev',
		next:'#next',
		scroll:
		{
			item:1,
			duration:500,
			pauseOnHover:true
		},

		auto:true,
		items:
		{
			visible:{min:1,max:4},
			height:"variable"
		}
		

	});

	$('.team-carousel').carouFredSel({

		responsive:true,
		width:'100%',
		circular:true,
		prev:'#team-prev',
		next:'#team-next',
		scroll:
		{
			item:1,
			duration:500,
			pauseOnHover:true
		},

		auto:true,
		items:
		{
			visible:{min:1,max:4},
			height:"variable"
		}
		

	});


	$('.testimonials-carousel').carouFredSel({

		responsive:true,
		width:'100%',
		circular:true,
		scroll:
		{
			item:1,
			duration:500,
			pauseOnHover:true
		},

		auto:true,
		items:
		{
			visible:{min:1,max:1},
			height:"variable"
		},
		pagination:
		{
			container:".testipager",
			anchorBuilder:false
		}

	});


	/*$(window).scroll(function(){

		var top = $(window).scrollTop();
		if (top>=60) 
		{
			$("header").addClass('secondary-dark-blue-bg');
		}else{
			
			if ($("header").hasClass('secondary-dark-blue-bg')) 
			{
				$("header").removeClass('secondary-dark-blue-bg');
			}
		}

	});*/

	/*$(window).on('scroll',function(){

		if ($(window).scrollTop()) 
		{

			$('header').addClass('secondary-dark-blue-bg');
		}
		else
		{
			$('header').removeClass('secondary-dark-blue-bg');
		}
	});
	*/

	$(document).ready(function()
	{
		$('.menu').click(function()
		{
			$('nav').toggleClass('active')
		})
	})

	$(document).ready(function()
	{
		$('.menu-icon').click(function()
		{
			$('.menu-icon').toggleClass('activated')
		})
	})


	$(document).ready(function()
	{
		$('#lang').click(function()
		{
			$('.dropdown-lan').toggleClass('active')
		})
	})

	/*For SmoothScroll Effect*/

	$(document).ready(function(){
	  // Add smooth scrolling to all links
	  $("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	      	scrollTop: $(hash).offset().top
	      }, 800, function(){

	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	    });
	    } // End if
	});
	});

});


/*For Dropdown Click*/


$(document).ready(function()
{
	$('#jobtype').click(function()
	{
		$('#filter-menu1').toggleClass('active')
	})
})
$(document).ready(function()
{
	$('#prefecture').click(function()
	{
		$('#filter-menu2').toggleClass('active')
	})
})
$(document).ready(function()
{
	$('#level').click(function()
	{
		$('#filter-menu3').toggleClass('active')
	})
})
