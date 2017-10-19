	(function($){
    
	    $('.confirm').click(function(e){
	        e.preventDefault();
	        $('.verif').addClass('invisible');
	        $('.verif').removeClass('visible');
	        $('.choose').addClass('visible');
	        $('.choose').removeClass('invisible');

	    });
	    $('.choosen').click(function(e){
	        e.preventDefault();
	        $('.choose').addClass('invisible');
	        $('.choose').removeClass('visible');
	        $('.pay').addClass('visible');
	        $('.pay').removeClass('invisible');
	    });
	    $('.back-button').click(function(e){
	        e.preventDefault();
	        $('.verif').addClass('visible');
	        $('.verif').removeClass('invisible');
	        $('.choose').addClass('invisible');
	        $('.choose').removeClass('visible');
	        $('.pay').addClass('invisible');
	        $('.pay').removeClass('visible');

	    });
	    
	})(jQuery);