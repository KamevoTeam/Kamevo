	function handleAJAXReturn() //retour d'ajax
			{
    		if (http.readyState == 4)
   			 {
       			 if (http.status == 200)
       			 {
              var getFromPhp = http.responseText; //je stocke la valeur de retour http danq une variable
              var infoReturn = 0;
  

              if(getFromPhp.indexOf("sub") >= 0 ){
                /*   Retour ajax: abonnement   */


                  var div_sub = document.getElementById('submessage');
                  //div_sub.style.display = "block"; //on affiche la div
                  

                  

                  $(document).ready(function(){
                         setTimeout(function(){$(".submessage").fadeOut('slow');}, 1000);
                  });

                  if(getFromPhp.indexOf("noco") >= 0){

                    //div_sub.innerHTML = 'Tu dois être connecté!';

                  }else {

                    if(getFromPhp.indexOf("good") >= 0){

                     // div_sub.innerHTML = 'Abonnement effectué!';
                      $('.subscribe-btn').empty();
                      $('.subscribe-btn').append("Se désabonner");


                    }else{

                      if(getFromPhp.indexOf("own") >= 0){

                        //div_sub.innerHTML = 'Inutile!';

                      }else{

                          if(getFromPhp.indexOf("unsubok") >= 0){

                            div_sub.innerHTML = 'Abonnement retiré';
                            $('.subscribe-btn').empty();
                            $('.subscribe-btn').append("S'abonner");

                          }

                      }
                    }

                  }

                  
                }

              if(getFromPhp.indexOf("votep") >= 0 ){

                  /*  retour ajax vote   */

                  /*test updating progress 
                  */


                  var whereVoteIs = getFromPhp.indexOf('votep');
                  var infoIdComment = getFromPhp .substr(0,whereVoteIs);
                  
                  var responPhp = getFromPhp;
                  
                  getFromPhp = getFromPhp.substr(5+whereVoteIs);


                  var nameOfdiv = 'votemessage'+infoIdComment;
                  var div_vote = document.getElementById(nameOfdiv);
                 // div_vote.style.display = "block"; //on affiche la div
                  div_vote.innerHTML = getFromPhp; //on affiche le message. Faudra faire une div plus propre quand-même xD

                  $(document).ready(function(){
                         setTimeout(function(){$('.'+nameOfdiv).fadeOut('slow');}, 2000);
                  });
                   

                   var containerLike = '.nblikesid'+infoIdComment;
                   var containerDislike = '.nbdislikesid'+infoIdComment;

                   var valLikeBefore = document.getElementById('nblikesid'+infoIdComment).innerHTML;
                   var valDislikeBefore = document.getElementById('nbdislikesid'+infoIdComment).innerHTML;

                  
                   /*updating progress bar*/

                   //var before = $('#avancement').prop('value');
                  
                   
                   
                   if(responPhp.indexOf('New=1') >= 0){

                      var newLike = parseInt(valLikeBefore)+1;
                      $(containerLike).empty();
                      $(containerLike).append(newLike);
                

                   }

                   if(responPhp.indexOf('New=2') >= 0){

                      var newDislike = parseInt(valDislikeBefore)+1;
                      $(containerDislike).empty();
                      $(containerDislike).append(newDislike);
                      
                    
                   }
                   if(responPhp.indexOf('Old=1') >= 0){

                      var newLike = parseInt(valLikeBefore)-1;
                      $(containerLike).empty();
                      $(containerLike).append(newLike);
                      
                    
                   }
                   if(responPhp.indexOf('Old=2') >= 0 ){

                      var newDislike = parseInt(valDislikeBefore)-1;
                      $(containerDislike).empty();
                      $(containerDislike).append(newDislike);
                     
                    
                   }
                   if(responPhp.indexOf('Nw=1andOd=2') >= 0 ){

                      /* Add a new like */ 
                      var newLike = parseInt(valLikeBefore)+1;
                      $(containerLike).empty();
                      $(containerLike).append(newLike);

                      /* remove the old dislike */

                      var newDislike = parseInt(valDislikeBefore)-1;
                      $(containerDislike).empty();
                      $(containerDislike).append(newDislike);


                      
                    
                   }
                   if(responPhp.indexOf('Nw=2andOd=1') >= 0 ){

                      /* Add a new dislike */ 

                       var newDislike = parseInt(valDislikeBefore)+1;
                      $(containerDislike).empty();
                      $(containerDislike).append(newDislike);

                      /* remove the old like */

                      var newLike = parseInt(valLikeBefore)-1;
                      $(containerLike).empty();
                      $(containerLike).append(newLike);
        

                   }

                   var newVal = 0;
                   var valLikeNew = parseInt(document.getElementById('nblikesid'+infoIdComment).innerHTML);
                   var valDislikeNew = parseInt(document.getElementById('nbdislikesid'+infoIdComment).innerHTML);

                   if(valDislikeNew + valLikeNew == 0){

                      newVal = 50;

                   }else{

                      newVal = 100*(valLikeNew/(valLikeNew + valDislikeNew));

                   }

             
                /*some animated thing :D */
                //alert(infoIdComment);
                var targetDiv = '.avancementid'+infoIdComment;

               $( targetDiv ).animate({
                  opacity: 0.50,
                  
                }, 50, function() {
                  

                    $( targetDiv).animate({
                        opacity: 1,
                        value: newVal

                      }, 1000, function() {
                        //animation terminée xD
                      });

                });



                  

                }
                if(getFromPhp.indexOf("votec") >= 0 ){ 

                  /*  retour ajax vote commentaire  */
                  var whereVoteIs = getFromPhp.indexOf('votec');
                  var infoIdComment = getFromPhp .substr(0,whereVoteIs);
                    

                  getFromPhp = getFromPhp.substr(5+whereVoteIs);

                  


                  var nameOfdiv = 'ErrorcommentId'+infoIdComment;
                  var div_vote = document.getElementById(nameOfdiv);
                  div_vote.style.display = "block"; //on affiche la div
                  div_vote.innerHTML = getFromPhp; //on affiche le message. Faudra faire une div plus propre quand-même xD

                  $(document).ready(function(){
                         setTimeout(function(){$('.'+nameOfdiv).fadeOut('slow');}, 2000);
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

        function userVoteComment(vote,idComment){

          http = createRequestObject();
          http.open('POST', 'php/voteComment.php', true);
          http.onreadystatechange = handleAJAXReturn;
          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          http.send('result='+vote+'&comment='+idComment);
        }
