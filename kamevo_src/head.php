	<title>Kamevo</title>
	<meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="img/kamico.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<!--  ORGINAL INCLUSIONS  !-->

	<link rel="stylesheet" href="css/feed.css">
	<link rel="stylesheet" href="css/block.css">
  <link rel="stylesheet" href="css/chat.css">
	<link rel="stylesheet" href="css/pub.css"> 
	<link rel="stylesheet" href="css/social.css">
	<link rel="stylesheet" href="css/line-separator.css">
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" href="css/menu_co.css">
  <link rel="stylesheet" href="css/notes.css">

    <!--  LOADING FRAMWORKS   !-->
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>

    <!-- LINKED CSS FROM DETAILS TO LOAD !-->
    <link rel="stylesheet" href="css/likes.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">

    <!-- LOADING JAVASCRIPT/AJAX  !-->
    <script type="text/javascript" src="js/createHttpObject.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script> 
    <script type="text/javascript" src="js/jquery-ias.min.js"></script> <!-- infinite scroll lib for better stuff :)  --> 
    <script type="text/javascript">
    	/*  Infinite scroll pour charger les commentaires   */
    	var ias = jQuery.ias({
  			container:  '#totalPost',
  			item:       '.block',
  			pagination: '#pageCountHome',
  			next:       '.nextPage'
		});

		ias.extension(new IASSpinnerExtension());
		ias.extension(new IASNoneLeftExtension({text: "Fin des publications"}));

		ias.extension(new IASTriggerExtension({

			text: 'Afficher plus de publications', 
			offset: 4

		}));

    </script>