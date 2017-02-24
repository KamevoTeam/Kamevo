(function($){
    $('.f-input').focus(function(e){
	    $('.results').addClass('resulted');
	})
	$( ".f-input" ).blur( function() {
	    $('.results').removeClass('resulted');
	});
})(jQuery);