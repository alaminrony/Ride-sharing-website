
var s2 = new Swiper('.s2', {
  slidesPerView: 'auto',
  spaceBetween: 30,
  pagination: {
    el: '.swiper-pagination4',
    clickable: true,
  },
	autoplay: {
        delay: 2000,
        disableOnInteraction: false,
  },
  breakpoints: {
    		// when window width is >= 320px
    		320: {
    		  slidesPerView: 1,
    		  spaceBetween: 20
    		},
    		// when window width is >= 480px
    		480: {
    		  slidesPerView: 1,
    		  spaceBetween: 30
    		},
    		// when window width is >= 640px
    		640: {
    		  slidesPerView: 1,
    		  spaceBetween: 50
    		},
    		1200: {
    			slidesPerView: 1,
    			spaceBetween: 30
    		}
  }
});

var riderPageSlider = new Swiper('.riderPageSlider', {
	slidesPerView: 'auto',
	spaceBetween: 10,
	pagination: {
	  el: '.swiper-pagination5',
	  clickable: true,
	},
	  autoplay: {
		  delay: 3000,
		  disableOnInteraction: false,
	},
  });



var sTest = new Swiper('.sTest', {
  slidesPerView: 'auto',
  spaceBetween: 30,
  pagination: {
    el: '.swiper-pagination3',
    clickable: true,
  },
	autoplay: {
        delay: 2000,
        disableOnInteraction: true,
  },
  breakpoints: {
    		// when window width is >= 320px
    		320: {
    		  slidesPerView: 1,
    		  spaceBetween: 20
    		},
    		// when window width is >= 480px
    		480: {
    		  slidesPerView: 1,
    		  spaceBetween: 30
    		},
    		// when window width is >= 640px
    		640: {
    		  slidesPerView: 1,
    		  spaceBetween: 50
    		},
    		1200: {
    			slidesPerView: 1,
    			spaceBetween: 30
    		}
  }
});

// var s2 = new Swiper('.s2', {
// 	direction: 'vertical',
// 	slidesPerView: 1,
// 	spaceBetween: 30,
// 	mousewheel: true,
// 	pagination: {
// 	  el: '.swiper-pagination1',
// 	  clickable: true,
// 	},
// 	autoplay: {
//         delay: 2000,
//         disableOnInteraction: false,
//     },
// });