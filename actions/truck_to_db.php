<?php




	
	$month = $_POST['month'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = $_POST['address'];



	  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$address."&sensor=true";
	  $xml = simplexml_load_file($request_url) or die("url not loading");
	  $status = $xml->status;
	  if ($status=="OK") {
	      $truckLat = $xml->result->geometry->location->lat;
	      $truckLon = $xml->result->geometry->location->lng;
	  }



$addr= $address;
$lat = $truckLat;
$lon = $truckLon;


// setup the database connect
//$cxn = mysqli_connect('hightide', 'dmltncom_danny', 'theSqlPassword!','dmltncom_slider757addresses' );
//if (!$cxn)
//    exit;
//
//
//
//// lets setup our insert query
//$sql = "INSERT INTO trucklocation (address, month, date, time, lat, lon) VALUES ('".$address."', '".$month."', '".$dater."', '".$time."', '".$lat."', '".$lon."' )";
//
//// lets run our query
//echo $sql;
//
//
//
//$result = mysqli_query( $cxn, $sql);
//echo $result;


$cxn = mysqli_connect('localhost', 'root', '', 'test' );
if (!$cxn)
    exit;




// lets setup our insert query
$sql = "INSERT INTO trucklocation (address, month, date, time, lat, lon) VALUES ('".$address."', '".$month."', '".$date."', '".$time."', '".$lat."', '".$lon."' )";

// lets run our query
echo $sql; 



$result = mysqli_query( $cxn, $sql);
echo $result;


?>
