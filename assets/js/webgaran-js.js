jQuery(document).ready(function($){
	$(".project").hover3d({
		selector: ".project__card",
    shine: true,
        sensitivity: 20,
	});
});




// jQuery(document).ready(function($){
//   $(window).scroll(function() {
//     var winTop = $(window).scrollTop();
//     if (winTop >= 30) {
//       $("header #menubar").addClass("sticky");
//     } else {
//       $("header #menubar").removeClass("sticky");
//     }
//   })
// });





jQuery(document).ready(function($){
    var offset = 100;
    var speed = 800;
    var duration = 500;
       $(window).scroll(function(){
            if ($(this).scrollTop() < offset) {
                 $('#totop') .fadeOut(duration);
            } else {
                 $('#totop') .fadeIn(duration);
            }
        });
    $('#totop').on('click', function(){
        $('html, body').animate({scrollTop:0}, speed);
        return false;
        });
});






jQuery(document).ready(function($){
	$.mCustomScrollbar.defaults.scrollButtons.enable=true; //enable scrolling buttons by default
	$.mCustomScrollbar.defaults.axis="yx"; //enable 2 axis scrollbars by default
	$(".scroll_it ").mCustomScrollbar({
		setHeight: 150,
		theme:"light"
	});
});

jQuery(document).ready(function($){
  $.mCustomScrollbar.defaults.scrollButtons.enable=true; //enable scrolling buttons by default
  $.mCustomScrollbar.defaults.axis="yx"; //enable 2 axis scrollbars by default
  $(".ffff").mCustomScrollbar({
    setHeight: 200,
    theme:"light"
  });
});


jQuery(document).ready(function($){
    $('[data-toggle="tooltip"]').tooltip();
});



//jQuery(document).ready(function($) {

/* Stick navigation to the top of the page */
//var stickyNavTop = $('#menubar').offset().top;

//$(window).scroll(function(){
	//var scrollTop = $(window).scrollTop();

	//if (scrollTop > stickyNavTop) {
		//$('#menubar').addClass('sticky-header');
		//$('#menubar').addClass('shifted');
	//} else {
	//	$('#header').removeClass('sticky-header');
	//	$('#menubar').removeClass('shifted');
	//}

//});
//});

jQuery(document).ready(function($){
$(".pulse").prepend("<span class='spinner-grow spinner-grow-sm'></span>");
});


jQuery(document).ready(function($) {
  $(window).on('load scroll resize', function() {

    var docHeight = $(document).height();
    var windowPos = $(window).scrollTop();
    var windowHeight = $(window).height();
    var windowWidth = $(window).width();
    var completion = windowPos / (docHeight - windowHeight);

    if (docHeight <= windowHeight) {
      $('#progress').width(windowWidth);
    } else {
      $('#progress').width(completion * windowWidth);
    }

  });
});



//load more content
jQuery(document).ready(function($) {
$(document).on('click', '.load-more', function (event) {
    event.preventDefault();
    var $this = $(this);
    $this.text('در حال بارگذاری ...');
    var $page = parseInt($this.data('page'));
    $.ajax({
        url: data.ajax_url,
        type: 'post',
        dataType: 'json',
        data: {
            action: 'load_more_content',
            page: $page
        },
        success: function (response) {
            if (parseInt(response.count) > 0) {
                $this.parent().before(response.content);
                $this.data('page', parseInt($page + 1));
            }
            $this.text('مطالب بیشتر');
        },
        error: function () {
        }
    });
});
});


