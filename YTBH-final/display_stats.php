<?php
include('php/getGeneralStats.php');
?>
<div class="info">
		<div class="users">
			<h4>UTILISATEURS</h4>
			<div class="line-separator5"></div>
			<h6>Inscrits : <strong><?=getGeneralStats::getUsersIns();?></strong></h6>
			<h6>Connectés : <strong><?=getGeneralStats::getUsersOnline();?></strong></h6>
			<h6>Visites : <strong><?=getGeneralStats::getTotalViews();?></strong></h6>
		</div>
		<div class="users">
			<h4>MISES A JOUR</h4>
			<div class="line-separator5"></div>
			<h6>14/08 : <strong>Menu responsive</strong></h6>
			<h6>21/10 : <strong>Fil d'actualité</strong></h6>
			<h6>30/12 : <strong>Thême 2017</strong></h6>
		</div>
	</div>#