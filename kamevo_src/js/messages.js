$(document).ready(function(){
	$('.message').click(function(e){
	    $('.message-center').toggleClass('messaged');
	    $('.notes-center').removeClass('noted');
	})
});