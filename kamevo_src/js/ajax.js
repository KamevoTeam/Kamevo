	function handleAJAXReturn() //retour d'ajax
			{
    		if (http.readyState == 4)
   			 {
       			 if (http.status == 200)
       			 {
              var getFromPhp = http.responseText; //je stocke la valeur de retour http danq une variable
              //alert(typeof(getFromPhp));

              console.log(getFromPhp);

              if(getFromPhp == 'subown'){

                console.log('reponse: subown');
              }else{

                console.log('reponse: pas subown');
              }

           			 //alert(http.responseText);
               // if(http.responseText == 'subok' || http.responseText == 'unsubok' || http.responseText == 'subown' || http.responseText == 'subnoco'){
           			     var div_sub = document.getElementById('submessage');

           			    div_sub.style.display = "block"; //on affiche la div

           			    div_sub.innerHTML = http.responseText; //on affiche le message. Faudra faire une div plus propre quand-même xD

           			      $(document).ready(function(){
    				             setTimeout(function(){$(".submessage").fadeOut('slow');}, 1000);
					             });
           			 
                   //}else{

                    //alert('Une erreur fatal est survenue!');

                  // }

       				 }
        		else
        		{
           			 alert('Erreur! Veuillez rechargez la page. ');
        		}
    		}
		}

    function sub(abonnement){ //bouton s'abonner
    
          http = createRequestObject();
          http.open('POST', 'php/sub.php', true);
          http.onreadystatechange = handleAJAXReturn;
          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          http.send('abonnement='+abonnement);

    }
    function userVote(vote,idPost){

          http = createRequestObject();
          http.open('POST', 'php/vote.php', true);
          http.onreadystatechange = handleAJAXReturn;
          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          http.send('result='+vote+'&post='+idPost);
        }
