	function handleAJAXReturn() //retour d'ajax
			{
    		if (http.readyState == 4)
   			 {
       			 if (http.status == 200)
       			 {
              var getFromPhp = http.responseText; //je stocke la valeur de retour http danq une variable
              var infoReturn = 0;
              var infoIdComment = getFromPhp .substr(0,1);
              getFromPhp = getFromPhp.substr(1);

              if(getFromPhp.indexOf("sub") >= 0 ){
                /*   Retour ajax: abonnement   */

                  var div_sub = document.getElementById('submessage');
                  div_sub.style.display = "block"; //on affiche la div
                  div_sub.innerHTML = http.responseText; //on affiche le message. Faudra faire une div plus propre quand-même xD

                  $(document).ready(function(){
                         setTimeout(function(){$(".submessage").fadeOut('slow');}, 1000);
                  });
                  
                }else{

                  /*  retour ajax vote   */
                  var nameOfdiv = 'votemessage'+infoIdComment;
                  var div_vote = document.getElementById(nameOfdiv);
                  div_vote.style.display = "block"; //on affiche la div
                  div_vote.innerHTML = getFromPhp; //on affiche le message. Faudra faire une div plus propre quand-même xD

                  $(document).ready(function(){
                         setTimeout(function(){$('.'+nameOfdiv).fadeOut('slow');}, 1000);
                  });
                   
                 
                }

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
