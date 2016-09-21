System de vote ajax.--------------------
Url     : http://codes-sources.commentcamarche.net/source/52513-system-de-vote-ajaxAuteur  : Dav_cDate    : 03/08/2013
Licence :
=========

Ce document intitulé « System de vote ajax. » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

Un petit system de vote avec &eacute;toile.
<br />-Nombre d'&eacute;toile modif
iable &eacute;sement.
<br />-Functionne avec une base de donner
<br />-Un peut
 de javascript pour le design
<br />-Ajax pour resultat instanner
<br />-Cooki
e pour &eacute;vit&eacute; le post en boucle
<br />-Il n'y a qu'a utiliser un i
nclude
<br />
<br />Note:
<br />- Marche avec id donc utiliser une id adapter
 au system de vote.
<br />A vous de trouver comment d&eacute;finir cette idee s
i vous utiliser plusieur fois &quot;la meme&quot;.
<br />- Il n'y a pas encore 
d'administration.
<br />
<br />Merci de commenter, j'ai fait cette source pour
 apprendre ajax. sont utilation demontre bien le functionnement.
<br /><a name=
'source-exemple'></a><h2> Source / Exemple : </h2>
<br /><pre class='code' dat
a-mode='basic'>
&lt;?php
include(&quot;conf.php&quot;);
$ID_vote = $_GET['ID_
vote'];
$Mod = $_GET['Mod'];
$note = $_GET['note'];

$Total_etoile = 5;

i
f($note!=''){setcookie('Vote'.$ID_vote,&quot;OK&quot;,time()+365*24*5); }
?&gt;

&lt;script type=&quot;text/javascript&quot;&gt;
function httpRequest(file){

var xhr_object = null; 
if(window.XMLHttpRequest) // Firefox 
   xhr_object = 
new XMLHttpRequest(); 
else if(window.ActiveXObject) // Internet Explorer 
   
xhr_object = new ActiveXObject(&quot;Microsoft.XMLHTTP&quot;); 
else { // XMLHt
tpRequest non supporté par le navigateur 
   alert(&quot;Votre navigateur ne su
pporte pas les objets XMLHTTPRequest...&quot;); 
   return; 
} 

var div = d
iv;
var file = file;

xhr_object.open(&quot;GET&quot;, file, true); 

xhr_o
bject.onreadystatechange = function() { 
   if(xhr_object.readyState == 4){
//
   alert(xhr_object.responseText);
document.getElementById('etoile').innerHTML 
= xhr_object.responseText;
//document.getElementById('etoile').innerHTML = xhr.
responseText;
   }
}  
xhr_object.send(null);
}

function etoile_mouseOver
(etoile) 
{document.getElementById(&quot;etoile&quot;+etoile).src=&quot;etoile_
select.png&quot;;} 

function etoile_mouseOut(etoile,etat) 
{ 
if(etat == 0)
{document.getElementById(&quot;etoile&quot;+etoile).src=&quot;etoile.png&quot;;}

else if(etat == 1){document.getElementById(&quot;etoile&quot;+etoile).src=&quo
t;etoile_demi.png&quot;;}
else if(etat == 2){document.getElementById(&quot;etoi
le&quot;+etoile).src=&quot;etoile_fonce.png&quot;;}

} 

&lt;/script&gt;
&l
t;?php

///////////////connection a la db
$connect=mysql_connect($sql_serveur
,$sql_user,$sql_pass);
mysql_select_db($sql_db, $connect);
/////////////Fourch
ette de conditon///////////
if($note!='' and $_COOKIE['Vote'.$ID_vote]!='OK'){

/////////recuperation du prochaine id//////////////
$req1=&quot;select max(ID)
 from vote_index&quot;;
$res1=mysql_query($req1);
$idmax1=mysql_result($res1,0
,&quot;max(ID)&quot;)+1; 

$requete = &quot;INSERT INTO vote_donner (ID, ID_vo
te, Note) VALUES ('&quot;.$idmax1.&quot;', '&quot;.$ID_vote.&quot;','&quot;.$not
e.&quot;')&quot;;
mysql_query ($requete,$connect);
}

$result=mysql_query(&q
uot;SELECT * FROM vote_donner WHERE ID_vote='&quot;.$ID_vote.&quot;'&quot;);
wh
ile($row=mysql_fetch_array($result)){
$Nb_etoile=$Nb_etoile.';'.$row['Note'];

}
$Nb_etoile=split(';',$Nb_etoile);
for ($cpt=0; $cpt&lt;(count($Nb_etoile)); 
$cpt++){
$temps_etoile = $temps_etoile + $Nb_etoile[$cpt];
}
if($cpt-1!=0){$t
emps_etoile = $temps_etoile / ($cpt-1);}

////////////affiche image etoile
ec
ho '&lt;div id=etoile&gt;';
///etoile complete pale
$Nb_etoile=str_split($temp
s_etoile, 1);  
for ($cpt=0; $cpt&lt;($Nb_etoile[0]); $cpt++){
$temps_etoile =
 $cpt+1;

//////texte alt
if($_COOKIE['Vote'.$ID_vote]!='OK'){
$texte_alt='V
oter un '.$temps_etoile;}
else{$texte_alt=&quot;Vous avez deja voter.&quot;;}


echo '&lt;img id=&quot;etoile'.$temps_etoile.'&quot; src=&quot;etoile.png&quot
; Alt=&quot;'.$texte_alt.'&quot; onClick=&quot;httpRequest(\'vote.php?ID_vote='.
$ID_vote.'&amp;Mod=Mod&amp;note='.$temps_etoile.'\');&quot; onmouseover=&quot;et
oile_mouseOver('.$temps_etoile.')&quot; onmouseOut=&quot;etoile_mouseOut('.$temp
s_etoile.',0)&quot;/&gt;';
}
If($Nb_etoile[2]!=''){
$temps_etoile = $temps_et
oile+1;

//////texte alt
if($_COOKIE['Vote'.$ID_vote]!='OK'){
$texte_alt='Vo
ter un '.$temps_etoile;}
else{$texte_alt=&quot;Vous avez deja voter.&quot;;}


echo '&lt;img id=&quot;etoile'.$temps_etoile.'&quot; src=&quot;etoile_demi.png&
quot; Alt=&quot;'.$texte_alt.'&quot; onClick=&quot;httpRequest(\'vote.php?ID_vot
e='.$ID_vote.'&amp;Mod=Mod&amp;note='.$temps_etoile.'\');&quot; onmouseover=&quo
t;etoile_mouseOver('.$temps_etoile.')&quot; onmouseOut=&quot;etoile_mouseOut('.$
temps_etoile.',1)&quot;/&gt;';
}
///etoile complete fonce
$Nb_etoile[0] = $To
tal_etoile-$Nb_etoile[0];
if($Nb_etoile[2]!=''){$Nb_etoile[0] = $Nb_etoile[0]-1
;}
for ($cpt=0; $cpt&lt;($Nb_etoile[0]); $cpt++){
$temps_etoile = $temps_etoil
e+1;

//////texte alt
if($_COOKIE['Vote'.$ID_vote]!='OK'){
$texte_alt='Voter
 un '.$temps_etoile;}
else{$texte_alt=&quot;Vous avez deja voter.&quot;;}

ec
ho '&lt;img id=&quot;etoile'.$temps_etoile.'&quot; src=&quot;etoile_fonce.png&qu
ot; Alt=&quot;'.$texte_alt.'&quot; onClick=&quot;httpRequest(\'vote.php?ID_vote=
'.$ID_vote.'&amp;Mod=Mod&amp;note='.$temps_etoile.'\');&quot; onmouseover=&quot;
etoile_mouseOver('.$temps_etoile.')&quot; onmouseOut=&quot;etoile_mouseOut('.$te
mps_etoile.',2)&quot;/&gt;';
}
echo '&lt;/div&gt;';

?&gt;

+ sql
</pre>

<br /><a name='conclusion'></a><h2> Conclusion : </h2>
<br />Y'a qu'a importe
r la base de donner.
<br />Adapter le fichier conf.php
<br />Ouvrir le fichier
 ak ?ID_vote=???
<br />
<br />Et tester.
<br />
<br />Ps: image et sql dans 
le zip.
