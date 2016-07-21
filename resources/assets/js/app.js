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
