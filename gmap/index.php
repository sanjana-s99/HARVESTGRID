<?php
/*
@author: Shahrukh Khan
@website: http://www.thesoftwareguy.in
@date published: 19th December, 2013
*/
require_once("simpleGMapAPI.php");
require("../includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HARVESTGRID</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="container">
  <div id="body">
    <article>
	 <div id="maps">
		 <?php 
		$query = "SELECT * FROM users WHERE user_role = 'F'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$map = new simpleGMapAPI();
		
		$map->setWidth('100%');
		$map->setHeight('500px');
		$map->setBackgroundColor('#000');
		$map->setMapDraggable(true);
		$map->setDoubleclickZoom(true);
		$map->setScrollwheelZoom(true);
		
		$map->showDefaultUI(true);
		$map->showMapTypeControl(true, 'DROPDOWN_MENU');
		$map->showNavigationControl(true, 'DEFAULT');
		$map->showScaleControl(true);
		$map->showStreetViewControl(true);
		
		$map->setZoomLevel(6); // not really needed because showMap is called in this demo with auto zoom
		$map->setInfoWindowBehaviour('SINGLE_CLOSE_ON_MAPCLICK');
		$map->setInfoWindowTrigger('CLICK');

		while ($row = mysqli_fetch_assoc($result)){
			$map->addMarker($row['user_lat'], $row['user_lng'] , "Haji Ali, Mumbai, Maharashtra", '<h3>'.$row["user_name"]."-".$row["user_crop"].'</h3>'.'<p>Haji Ali Dargah is one of the most popular religious places in Mumbai, visited by people of all religions alike. Haji Ali Dargah is one of India’s most famous and prestigious landmarks situated about 500 yards from the Mumbai shoreline in the middle of the Arabian Sea off Lala Lajpatrai Marg. <img src="icons/test.jpg"> <a href="http://hajialidargah.in/" target="_blank">visit website</a></p>', "icons/img1.png");
		}
		$map->printGMapsJS();
		$map->showMap(true);
		?>
     </div>
    </article>
</div>
</body>
</html>
