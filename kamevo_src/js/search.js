(function($){
    $('.f-input').focus(function(e){
	    $('.results').addClass('resulted');
	})
	$( ".f-input" ).blur( function() {


	    $('.results').removeClass('resulted');
	    


	});
})(jQuery);

$('#search').keyup(function() {
	var keyword = $(this).val();
	if(keyword.length>1){		
		getContentFromSearch(keyword);


	}
	/* avoid disapearing effect :o (Wist) */
$('.results').hover(function(){
	 $('.results').addClass('resulted');
	})
});