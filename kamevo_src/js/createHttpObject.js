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