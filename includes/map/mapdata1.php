<?php
  require("../db.php");


  function parseToXML($htmlStr)
  {
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
  }


  // Select all the rows in the markers table
  $query = "SELECT * FROM users WHERE user_role = 'F'";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));

  header("Content-type: text/xml");

  // Start XML file, echo parent node
  echo "<?xml version='1.0' ?>";
  echo '<markers>';
  $ind=0;
  // Iterate through the rows, printing XML nodes for each
  while ($row = mysqli_fetch_assoc($result)){
    // Add to XML document node
    echo '<marker ';
    echo 'lat="' . $row['user_lat'] . '" ';
    echo 'lng="' . $row['user_lng'] . '" ';
    echo 'type="' . $row['user_crop'] . '" ';
    echo '/>';
    $ind = $ind + 1;
  }

  // End XML file
  echo '</markers>';
