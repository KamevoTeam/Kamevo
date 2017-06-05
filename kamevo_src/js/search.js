    $('.f-input').focusin(function(e){
	    $('.results').addClass('resulted');
	});
$('#search').keyup(function() {
	var keyword = $(this).val();

	if(keyword == ''){
		$('.results').removeClass("resulted");
	}else{
		$('.results').addClass("resulted");
	}
	if(keyword.length>0){		
		getContentFromSearch(keyword);


	}
	var mousedownHappened = false;

$('.f-input').blur(function() {
    if(mousedownHappened) // cancel the blur event
    {
        $('.focuser').focus();
        mousedownHappened = false;
    }
    else   // blur event is okay
    {
        $('.results').removeClass('resulted');
    }
});

$('.results').mousedown(function() {
    mousedownHappened = true;
});
/* avoid disapearing effect :o (Wist) */
$('.results').hover(function(){
	 $('.results').addClass('resulted');
	});
});