$(document).ready(function(){
	$('.msgjs').click(function(e){
	    e.preventDefault();
	})
	$('.msgjs').focus(function(e){
	    $('.message-center').addClass('messaged');
	    e.preventDefault();
	})

	var mousedownHappened = false;

	$('.msgjs').blur(function() {
	    if(mousedownHappened) // cancel the blur event
	    {
	        $('.msgjs').focus();
	        mousedownHappened = false;
	    }
	    else
	    {
	        $('.message-center').removeClass('messaged');
	    }
	});

	$('.message-center').mousedown(function() {
	    mousedownHappened = true;
	});
});