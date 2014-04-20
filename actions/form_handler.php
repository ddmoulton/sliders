

<?php
	$truckLocation = "5133 Brockie Street, Virginia Beach, VA, United States";
 
  	$address = array( 1 => "513 Bunker Drive, Virginia Beach, VA, United States",
  						2 => "230 Mannings Lane, Virginia Beach, VA, United States");


  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$truckLocation."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $truckLat = $xml->result->geometry->location->lat;
      $truckLon = $xml->result->geometry->location->lng;
      $truckLatLng = "$truckLat,$truckLon";
  }


foreach ($address as $val) {
    
	
	
	  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$val."&sensor=true";
	  $xml = simplexml_load_file($request_url) or die("url not loading");
	  $status = $xml->status;
	  if ($status=="OK") {
	      $userLat = $xml->result->geometry->location->lat;
	      $userLon = $xml->result->geometry->location->lng;
	      $userLatLng = "$userLat,$userLon";
	  }
	  else {

	  }
	  
	  echo "Truck Address: ".$truckLocation;

	   echo "<br />";
	  echo "Other Location: ".$val;

	  echo "<br />";


	  $distance = distance($truckLat, $truckLon, $userLat, $userLon);
	  echo "Distance: ";
	  echo $distance;
	  echo "<br />";
		echo "<br />";
	  echo "<br />";
}


function distance($lat1, $lon1, $lat2, $lon2) {


	$lat1 = floatval($lat1);
	$lat2 = floatval($lat2);
	$lon1 = floatval($lon1);
	$lon2 = floatval($lon2);

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  
    return ($miles * 1.609344);
}

?>
