
var go = 0;
//scrolling bar message box
$(document).ready(function(){
	$('.messager-messages').animate({
	   scrollTop: $('.messager-messages').offset().top
	}, 1500);

//Open message box with specific ID
	$('.chatter').click(function(e){

		go = 1;

		var idDestMessConv = 0;


	    $('.messager').toggleClass('messages-shower');

	    idDestMessConv = $(this).attr('id');

	    //var toto = $(this).attr('id');

	    //console.log('currentuser = '+toto);

	    /*FIL WITH USER INFOS*/
	    $('.userName').html(idDestMessConv);
	    $('.messager-img').attr('src','userDataUpload/picProfile/defaultAvatar.png');

		console.log('dest = '+idDestMessConv);

	    $('.idConv').val('Utilisateur'+idDestMessConv);

	    $('.messager-messages').animate({
		   scrollTop: $('.messager-messages').offset().top
		}, 1000);

	    //refreshing messages 
	    var auto_refresh = setInterval(
 		 function (){


 		 	if(go == 1){
 		 		console.log('go = '+idDestMessConv);
    			$('.messager-messages').load('php/getMessList.php?idTo='+idDestMessConv).fadeIn(1000,"slow");
    		}
  		}, 500); 



				    //envoi formulaire
			$('.messager-sender').keypress(function(e){
			    if( e.which == 13 ){

			    	e.preventDefault(); 
					e.stopPropagation(); 

					var textMess = $('.messager-input').val();

			    	console.log('Envois en cours...');

			    		$.ajax({

			       			url : 'php/sendMp.php', 
			      			type : 'POST',
			      			dataType : 'html',
			       			data : 'to='+idDestMessConv+'&cont='+textMess,
			       		

			       			 success : function(html_return, statut){ // code_html contient le HTML renvoyé
			       			 	
			       			 	

			       			 		console.log(html_return);

			       			 		$('.messager-input').val(''); //on vide l'input

			       			 		/* On scroll vers le bas */
			       			 		$('.messager-messages').animate({
									   scrollTop: $('.messager-messages').offset().top
									}, 1500);

			       			 	
			       			 		
			           
			       			},

			       			 error : function(resultat, statut, erreur){

			       			 		alert('Une erreur est survenue!');

			       			}

			    		});




			        
			    }
			});


 

	})

//close current message box
	$('.chatter-closer').click(function(e){
	    $('.messager').removeClass('messages-shower');
	    $('.idConv').val('');
	    auto_refresh = null;
	  	go = 0;
	    
	})

	});



