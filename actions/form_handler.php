

<?php




	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$within = $_POST['within'];

	// $truckLocation = "5133 Brockie Street, Virginia Beach, VA, United States";
 
  	// $address = "5133 Brockie Street, Virginia Beach, VA, United States";



  // $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$truckLocation."&sensor=true";
  // $xml = simplexml_load_file($request_url) or die("url not loading");
  // $status = $xml->status;
  // if ($status=="OK") {
  //     $truckLat = $xml->result->geometry->location->lat;
  //     $truckLon = $xml->result->geometry->location->lng;
  //     $truckLatLng = "$truckLat,$truckLon";
  // }


// foreach ($address as $val) {
    
	

	  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$address."&sensor=true";
	  $xml = simplexml_load_file($request_url) or die("url not loading");
	  $status = $xml->status;
	  if ($status=="OK") {
	      $userLat = $xml->result->geometry->location->lat;
	      $userLon = $xml->result->geometry->location->lng;
	      $userLatLng = "$userLat,$userLon";
	  }



// function distance($lat1, $lon1, $lat2, $lon2) {


// 	$lat1 = floatval($lat1);
// 	$lat2 = floatval($lat2);
// 	$lon1 = floatval($lon1);
// 	$lon2 = floatval($lon2);

//   $theta = $lon1 - $lon2;
//   $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
//   $dist = acos($dist);
//   $dist = rad2deg($dist);
//   $miles = $dist * 60 * 1.1515;
  
//     return ($miles * 1.609344);
// }

?>




<?php

$addr= $address;
$lat = $userLat;
$lon = $userLon;


// setup the database connect
$cxn = mysql_connect('localhost', 'root');
if (!$cxn)
    exit;
mysql_select_db('test', $cxn);


// lets setup our insert query
$sql = "INSERT INTO test (name, email, address, lat, lon, within) VALUES ('".$name."', '".$email."', '".$addr."', '".$lat."', '".$lon."', '".$within."' )";

// lets run our query
echo $sql;
$result = mysql_query($sql, $cxn);


?>
