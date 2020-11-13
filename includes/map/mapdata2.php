<?php
  require("../db.php");


  function parseToXML($htmlStr)
  {
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
  }


  // Select all the rows in the markers table
  $query = "SELECT farmerrqst.weight, farmerrqst.date, farmerrqst.rqst_id, farmerrqst.image1, farmerrqst.status, users.user_name, users.user_crop, users.user_lat, users.user_lng FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'N'";
  $result = mysqli_query($con, $query) or die(mysql_error());

  header("Content-type: text/xml");

  // Start XML file, echo parent node
  echo "<?xml version='1.0' ?>";
  echo '<markers>';
  $ind = 0;
  // Iterate through the rows, printing XML nodes for each
  while ($row = mysqli_fetch_assoc($result)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row['rqst_id'] . '" ';
    echo 'crop="' . parseToXML($row['user_crop']) . '" ';
    echo 'name="' . parseToXML($row['user_name']) . ' " ';
    echo 'weight="' . $row['weight'] . '" ';
    echo 'date="' . $row['date'] . '" ';
    echo 'lat="' . $row['user_lat'] . '" ';
    echo 'lng="' . $row['user_lng'] . '" ';
    echo 'image="' . $row['image1'] . '" ';
    echo 'status="' . $row['status'] . '" ';
    echo '/>';
    $ind = $ind + 1;
  }

  // End XML file
  echo '</markers>';
?>
