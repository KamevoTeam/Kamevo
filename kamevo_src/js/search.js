    $('.f-input').focusin(function(e){
	    $('.results').addClass('resulted');
	});
	$( ".f-input" ).blur( function(e) {
		// $(".f-input").focus();
	});
	$('.results').click(function(e){
	    $('.f-input').focus();
	});
	$('.result').click(function(){
		$('.f-inpt').focus();
	});
$('#search').keyup(function() {
	var keyword = $(this).val();

	if(keyword == ''){
		$('.results').removeClass("resulted");
	}else{
		$('.results').addClass("resulted");
	}
	if(keyword.length>1){		
		getContentFromSearch(keyword);


	}
	/* avoid disapearing effect :o (Wist) */
$('.results').hover(function(){
	 $('.results').addClass('resulted');
	});
});