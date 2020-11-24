//   $(window).on('load',function() { 
// 	$(document).ready(function(){
// 		$(".single_phone_slider").owlCarousel({
// 			items:1,
// 			loop:true,
// 			nav:true,
// 		});
// 	  });
// 	});
let menu = $('#nav li:first-child'),
	menuButton = $('#menu-button'),
	home = $('#nav li:nth-child(2)'),
	safety = $('#nav li:nth-child(3)'),
	ride = $('#nav li:nth-child(4)'),
	driver = $('#nav li:nth-child(5)'),
	contact = $('#nav li:nth-child(6)');
	mainMenu=$('.main-menu ul');
	offCanvasMenu=$('.off_canvas_menu');
	offCanvasOverlay=$('.off_canvas_overlay');

	menu.on('click',()=>{
		menuButton.toggleClass('active');
		home.toggleClass('active');
		safety.toggleClass('active');
		ride.toggleClass('active');
		driver.toggleClass('active');
		contact.toggleClass('active');
		mainMenu.toggleClass('active');
		offCanvasMenu.toggleClass('active');
		offCanvasOverlay.toggleClass('active');
		
	});
	$(".menu_close, .off_canvas_overlay").on('click',()=>{
		
		offCanvasMenu.removeClass('active');
		offCanvasOverlay.removeClass('active');
		
	});
	
$(".menu").click(function() {
	$(".menu").toggleClass("active");
	$(".navbar-menu").toggleClass("active");
	
});

$(document).ready(function() {
    $('.list-content ul').hide();
    $('.list-content p').click(function(e) {
        e.preventDefault();
        var $menuItem = $(this).next('ul');
        $menuItem.slideToggle();
        $('.list-content ul').not($menuItem).slideUp();
    });
});

$( function() {
    $( "#datepickerOne" ).datepicker;
} );


$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
    $(e.target)
      .prev()
      .find("i:last-child")
      .toggleClass("fa-minus fa-plus");
});


