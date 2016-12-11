var http; 

		function createRequestObject(){ //va donner l'objet http
											
    			var http;
    			if (window.XMLHttpRequest)
    				{ // Mozilla, Safari, IE7 ...
       				 http = new XMLHttpRequest();
    					}
    					else if (window.ActiveXObject)
    					{ // Si un gars utilise YTBH avec IE 6 lol
       					 http = new ActiveXObject("Microsoft.XMLHTTP");
    					}
   					return http;
					}


			function handleAJAXReturn()
			{
    		if (http.readyState == 4)
   			 {
       			 if (http.status == 200)
       			 {
           			 //alert(http.responseText);

           			  var div_sub = document.getElementById('submessage');

           			  div_sub.style.display = "block"; //on affiche la div

           			 div_sub.innerHTML = http.responseText; //on affiche le message. Faudra faire une div plus propre quand-même xD

           			$(document).ready(function(){
    				setTimeout(function(){$(".submessage").fadeOut('slow');}, 1000);
					});
           			 


       				 }
        		else
        		{
           			 alert('Erreur! Veuillez rechargez la page. ');
        		}
    		}
		}

		function sub(abonnement){
			

				//var params = "lorem=ipsum&name=binny";

    			http = createRequestObject();
   				http.open('POST', 'php/sub.php', true);
    			http.onreadystatechange = handleAJAXReturn;
    			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    			http.send('abonnement='+abonnement);





		}

