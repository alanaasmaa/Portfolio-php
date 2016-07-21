var $backToTop = $(".back-to-top");
$backToTop.hide();
$(window).on('scroll', function() {
  if ($(this).scrollTop() > 200) {
    $backToTop.fadeIn();
  } else {
    $backToTop.fadeOut();
  }
});

$backToTop.on('click', function(e) {
  $("html, body").animate({scrollTop: 0}, 500);
});
$(document).ready(function(){
    $( "#nav-trigger" ).click(function() {
        $( "#nav" ).toggle( "slow", function() {
            // Animation complete.
        });
    });
});
// Notifications.
$(document).ready(function(){
	CloseAlert = setTimeout(function(){
		$('.flashmessage').addClass("slideOutRight");
	}, 5000);  

	$('.flashmessage').click(function(){              
		$(this).addClass("slideOutRight");;
		clearTimeout(CloseAlert);
	});
});

//# sourceMappingURL=all.js.map
