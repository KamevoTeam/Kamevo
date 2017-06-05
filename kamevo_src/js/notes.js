$(document).ready(function(){
	$('.notejs').click(function(e){
	    e.preventDefault();
	})
	$('.notejs').focus(function(e){
	    $('.notes-center').addClass('noted');
	    e.preventDefault();
	})

	var mousedownHappened = false;

	$('.notejs').blur(function(e) {
	    if(mousedownHappened) // cancel the blur event
	    {
	        $('.notejs').focus();
	        mousedownHappened = false;
	    }
	    else
	    {
	        $('.notes-center').removeClass('noted');
	    	e.preventDefault();
	    }
	});

	$('.notes-center').mousedown(function() {
	    mousedownHappened = true;
	});
});