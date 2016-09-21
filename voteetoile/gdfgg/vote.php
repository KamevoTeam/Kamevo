<?php
include("conf.php");
$ID_vote = $_GET['ID_vote'];
$Mod = $_GET['Mod'];
$note = $_GET['note'];

$Total_etoile = 5;

if($note!=''){setcookie('Vote'.$ID_vote,"OK",time()+365*24*5); }
?>
<script type="text/javascript">
function httpRequest(file){
var xhr_object = null; 
if(window.XMLHttpRequest) // Firefox 
   xhr_object = new XMLHttpRequest(); 
else if(window.ActiveXObject) // Internet Explorer 
   xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 
else { // XMLHttpRequest non supporté par le navigateur 
   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
   return; 
} 

var div = div;
var file = file;

xhr_object.open("GET", file, true); 

xhr_object.onreadystatechange = function() { 
   if(xhr_object.readyState == 4){
//   alert(xhr_object.responseText);
document.getElementById('etoile').innerHTML = xhr_object.responseText;
//document.getElementById('etoile').innerHTML = xhr.responseText;
   }
}  
xhr_object.send(null);
}

function etoile_mouseOver(etoile) 
{document.getElementById("etoile"+etoile).src="etoile_select.png";} 

function etoile_mouseOut(etoile,etat) 
{ 
if(etat == 0){document.getElementById("etoile"+etoile).src="etoile.png";}
else if(etat == 1){document.getElementById("etoile"+etoile).src="etoile_demi.png";}
else if(etat == 2){document.getElementById("etoile"+etoile).src="etoile_fonce.png";}

} 

</script>
<?php

///////////////connection a la db
$connect=mysql_connect($sql_serveur,$sql_user,$sql_pass);
mysql_select_db($sql_db, $connect);
/////////////Fourchette de conditon///////////
if($note!='' and $_COOKIE['Vote'.$ID_vote]!='OK'){
/////////recuperation du prochaine id//////////////
$req1="select max(ID) from vote_index";
$res1=mysql_query($req1);
$idmax1=mysql_result($res1,0,"max(ID)")+1; 

$requete = "INSERT INTO vote_donner (ID, ID_vote, Note) VALUES ('".$idmax1."', '".$ID_vote."','".$note."')";
mysql_query ($requete,$connect);
}


$result=mysql_query("SELECT * FROM vote_donner WHERE ID_vote='".$ID_vote."'");
while($row=mysql_fetch_array($result)){
$Nb_etoile=$Nb_etoile.';'.$row['Note'];
}
$Nb_etoile=split(';',$Nb_etoile);
for ($cpt=0; $cpt<(count($Nb_etoile)); $cpt++){
$temps_etoile = $temps_etoile + $Nb_etoile[$cpt];
}
if($cpt-1!=0){$temps_etoile = $temps_etoile / ($cpt-1);}

////////////affiche image etoile
echo '<div id=etoile>';
///etoile complete pale
$Nb_etoile=str_split($temps_etoile, 1);  
for ($cpt=0; $cpt<($Nb_etoile[0]); $cpt++){
$temps_etoile = $cpt+1;

//////texte alt
if($_COOKIE['Vote'.$ID_vote]!='OK'){
$texte_alt='Voter un '.$temps_etoile;}
else{$texte_alt="Vous avez deja voter.";}

echo '<img id="etoile'.$temps_etoile.'" src="etoile.png" Alt="'.$texte_alt.'" onClick="httpRequest(\'vote.php?ID_vote='.$ID_vote.'&Mod=Mod&note='.$temps_etoile.'\');" onmouseover="etoile_mouseOver('.$temps_etoile.')" onmouseOut="etoile_mouseOut('.$temps_etoile.',0)"/>';
}
If($Nb_etoile[2]!=''){
$temps_etoile = $temps_etoile+1;

//////texte alt
if($_COOKIE['Vote'.$ID_vote]!='OK'){
$texte_alt='Voter un '.$temps_etoile;}
else{$texte_alt="Vous avez deja voter.";}

echo '<img id="etoile'.$temps_etoile.'" src="etoile_demi.png" Alt="'.$texte_alt.'" onClick="httpRequest(\'vote.php?ID_vote='.$ID_vote.'&Mod=Mod&note='.$temps_etoile.'\');" onmouseover="etoile_mouseOver('.$temps_etoile.')" onmouseOut="etoile_mouseOut('.$temps_etoile.',1)"/>';
}
///etoile complete fonce
$Nb_etoile[0] = $Total_etoile-$Nb_etoile[0];
if($Nb_etoile[2]!=''){$Nb_etoile[0] = $Nb_etoile[0]-1;}
for ($cpt=0; $cpt<($Nb_etoile[0]); $cpt++){
$temps_etoile = $temps_etoile+1;

//////texte alt
if($_COOKIE['Vote'.$ID_vote]!='OK'){
$texte_alt='Voter un '.$temps_etoile;}
else{$texte_alt="Vous avez deja voter.";}

echo '<img id="etoile'.$temps_etoile.'" src="etoile_fonce.png" Alt="'.$texte_alt.'" onClick="httpRequest(\'vote.php?ID_vote='.$ID_vote.'&Mod=Mod&note='.$temps_etoile.'\');" onmouseover="etoile_mouseOver('.$temps_etoile.')" onmouseOut="etoile_mouseOut('.$temps_etoile.',2)"/>';
}
echo '</div>';

?>
