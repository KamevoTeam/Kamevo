function clearNotifMpV2(notifID){

			var idOfNotifMp = notifID; 		

	 		$.ajax({

       			url : 'php/notifMp.php', 
      			type : 'POST',
      			dataType : 'html',
       			data : 'mode=delete&id='+idOfNotifMp,
       		
       			 success : function(html_return, statut){ // code_html contient le HTML renvoyé

       			 	$('#mpid'+idOfNotifMp).fadeOut(500);
       			 	
       			 	if(html_return != 'ok'){

       			 		console.log('Cleared.');
       			 	}     			 		
           
       			},

       			 error : function(resultat, statut, erreur){

       			 		alert('Une erreur est survenue!');

       			}

    		});

}



var go = 0;
var user2load = 0;
var sendTime = 0;
var sendOk = 0;


//scrolling bar message box
$(document).ready(function(){


	//Open message box with specific ID
	$('.chatter').click(function openMpBox(e){
	
		go = 1;
		var idDestMessConv = 0;


	    $('.messager').toggleClass('messages-shower');

	    user2load = $(this).prop('id');

	    /*clear notification*/
	    clearNotifMpV2(user2load);
	    $('.nbUserMp').html(' ');


	    var psdUser = $(".psdDestMess", this).val();
	    var avatarUser = $(".chatter-img", this).prop('src');


	    /*FIL WITH USER INFOS*/
	    $('.userName').html(psdUser);
	    $('.messager-img').attr('src',avatarUser);


	    $('.idConv').val('Utilisateur'+user2load);

	    //refreshing messages 
	    var auto_refresh = setInterval(
 		 function (){

 		 	if(go == 1 && user2load > 0){
    			$('.messager-messages').load('php/getMessList.php?idTo='+user2load).fadeIn(1000,"slow");
    		}

  		}, 1000);

  		 $('.messager-messages').animate({
									   scrollTop: $('.messager-messages').offset().top
		}, 1500); 

  		 

				    //envoi formulaire
			$('.messager-sender').keypress(function(e){
			    if( e.which == 13){

			    	e.preventDefault(); 
					e.stopPropagation(); 

					if(sendTime > 0){
			    		if((Date.now() - sendTime) < 10){
			    			sendOk = 0;
			    		}else{
			    			sendOk = 1;
			    		}
			    	}else{
			    		sendOk = 1;
			    	}

					var textMess = $('.messager-input').val();

			    	if(sendOk == 1){

			    		sendTime = Date.now(); 	

			    		$.ajax({

			       			url : 'php/sendMp.php', 
			      			type : 'POST',
			      			dataType : 'html',
			       			data : 'to='+user2load+'&cont='+textMess,
			       		

			       			 success : function(html_return, statut){ // code_html contient le HTML renvoyé	       			 	

			       			 		$('.messager-input').val(''); //on vide l'input

			       			 		/* On scroll vers le bas */
			       			 		$('.messager-messages').animate({
									   scrollTop: $('.messager-messages').offset().top
									}, 1500);


			           
			       			},

			       			 error : function(resultat, statut, erreur){

			       			 		alert('Une erreur est survenue!');
			       			}

		    			}); //end ajax
			    	}else{
			    		//console.log('envois refusé!');
			    	}
 
			    }
			});
	});

//close current message box
	$('.chatter-closer').click(function(e){
	    $('.messager').removeClass('messages-shower');
	    $('.idConv').val('');
	    auto_refresh = null;
	  	go = 0;
	  	user2load = 0;
	    
	})

	});





