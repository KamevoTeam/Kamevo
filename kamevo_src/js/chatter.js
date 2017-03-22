
//scrolling bar message box
$(document).ready(function(){
	$('.messager-messages').animate({
	   scrollTop: $('.messager-messages').offset().top
	}, 1500);

//Open message box with specific ID
	$('.chatter').click(function(e){


	    $('.messager').toggleClass('messages-shower');
	    $('.messager-messages').animate({
		   scrollTop: $('.messager-messages').offset().top
		}, 1000);
	})

//close current message box
	$('.chatter-closer').click(function(e){
	    $('.messager').removeClass('messages-shower');
	})

});