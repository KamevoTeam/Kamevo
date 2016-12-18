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

			function userVote(vote,idPost){
			

				var params = "lorem=ipsum&name=binny";

    			http = createRequestObject();
   				http.open('POST', 'php/vote.php', true);
    			http.onreadystatechange = handleAJAXReturn2;
    			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    			http.send('result='+vote+'&post='+idPost);
				}

			function handleAJAXReturn2()
			{
    		if (http.readyState == 4)
   			 {
       			 if (http.status == 200)
       			 {
           			 alert(http.responseText);
           			 document.getElementById('resultat').innerHTML = http.responseText;
       				 }
        		else
        		{
           			 alert('Erreur! Veuillez rechargez la page. ');
        		}
    		}
		}
