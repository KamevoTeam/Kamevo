$(document).ready(function(){
	$('.messager-messages').animate({
	   scrollTop: $('.messager-messages').offset().top
	}, 1500);
	$('.chatter').click(function(e){
	    $('.messager').toggleClass('messages-shower');
	    $('.messager-messages').animate({
		   scrollTop: $('.messager-messages').offset().top
		}, 1000);
	})
	$('.chatter-closer').click(function(e){
	    $('.messager').removeClass('messages-shower');
	})
});