(function ($) {
    "use strict";
    $(document).ready(function () {

        $('.mobile-menu-toggle').on('click', function () {
            $('.student-sidebar').addClass('show-sidebar');
            $('body').toggleClass('menu-has-opened');
        });

        $('.schedule-tabs .schedule-tab').on('click', function () {
            $('.time-table').hide();
            var dataId = $(this).data('id');
            $('#' + dataId).slideDown();
            $('.schedule-tabs .schedule-tab').removeClass('active');
            $(this).addClass('active');
        });

        $('.testimonial-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            autoplayHoverPause: true,
            navText: '',
            controls: true,
            responsive: {
                0: {
                    items: 1
                }
            }
        });

		// home - places slider
		$('.places-slider').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			autoplay: true,
			autoplayHoverPause: true,
			navText: ['Prev', 'Next'],
			controls: false,
			// center:true,
			autoplayTimeout: 2000,
			responsive: {
				0: {
					items: 1
				},
			}
		});

		// itinerary - tour summary carousel
		$('.tour-summary-carousel').owlCarousel({
			loop: true,
			margin: 0,
			autoplay: true,
			autoplayHoverPause: true,
			nav: true,
			navText: [
				'<i class="fa fa-angle-left" aria-hidden="true"></i>',
				'<i class="fa fa-angle-right" aria-hidden="true"></i>'
			],
			controls: false,
			// center:true,
			autoplayTimeout: 2000,
			responsive: {
				0: {
					items: 1
				},
				415: {
					items: 1
				},
				480: {
					items: 2
				},
				600: {
					items: 2
				},
				767: {
					items: 3
				},
				992: {
					items: 4
				},
				1199: {
					items: 4
				},
				2000: {
					items: 4
				}
			}
		});


		//gallery
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			layoutMode: 'fitRows',
		});

		$('.galley-category-list .gallery-filter-btn').on("click", function () {
			var value = $(this).attr('data-name');

			$grid.isotope({
				filter: value
			});

			$('.galley-category-list .gallery-filter-btn').removeClass('active');
			$(this).addClass('active');
		})

    });
})(jQuery);