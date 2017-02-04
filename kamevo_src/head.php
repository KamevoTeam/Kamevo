	<title>YTBH - Accueil</title>
	<meta charset="utf-8">
	<!--  ORGINAL INCLUSIONS  !-->

	<link rel="stylesheet" href="css/feed.css">
	<link rel="stylesheet" href="css/block.css">
	<link rel="stylesheet" href="css/pub.css">
	<link rel="stylesheet" href="css/social.css">
	<link rel="stylesheet" href="css/line-separator.css">
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" href="css/menu_co.css">
    <link rel="stylesheet" href="frameworks/w3.css">
    
    <!--  LOADING FRAMWORKS   !-->
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>

    <!-- LINKED CSS FROM DETAILS TO LOAD !-->
    <link rel="stylesheet" href="DESIGN/details/css/progressBar.css">
    <link rel="stylesheet" href="css/likes-details.css">


    <!-- LOADING JAVASCRIPT/AJAX  !-->
    <script type="text/javascript" src="js/createHttpObject.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script> 
    <script type="text/javascript" src="js/jquery-ias.min.js"></script> <!-- infinite scroll lib for better stuff :)  --> 
    <script type="text/javascript">
    	/*  Infinite scroll pour charger les commentaires   */
    	var ias = jQuery.ias({
  			container:  '#totalPost',
  			item:       '.block',
  			pagination: '#pageCount',
  			next:       '.nextPage'
		});

		ias.extension(new IASSpinnerExtension());
		ias.extension(new IASNoneLeftExtension({text: "Fin des publications"}));

		ias.extension(new IASTriggerExtension({

			text: 'Afficher plus de publications', 
			offset: 2

		}));

    </script>


