$(document).ready(function(){
	$('.notif').click(function(e){
	    $('.notes-center').toggleClass('noted');
	    $('.message-center').removeClass('messaged');
	})
});