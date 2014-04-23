<?php

$truckLocation = $_POST['address'];


   $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$truckLocation."&sensor=true";
   $xml = simplexml_load_file($request_url) or die("url not loading");
   $status = $xml->status;
   if ($status=="OK") {
       $truckLat = $xml->result->geometry->location->lat;
       $truckLon = $xml->result->geometry->location->lng;
   }


$cxn = mysqli_connect('hightide', 'dmltncom_danny', 'theSqlPassword!','dmltncom_slider757addresses' );
if (!$cxn)
    exit;


// lets setup our insert query
$sql = "SELECT * FROM addressList";
    
    echo $sql;
$result = mysqli_query( $cxn, $sql);

if (!$result) {
    mail("ddmoulton@vwc.edu",  "noresulres", "no results");
}
else {
    while($row = $result->fetch_array()) {
     
        $userLat = floatval($row['lat']);
        $userlon = floatval($row['lon']);
<<<<<<< HEAD
=======
        $within = floatval($row['within']);
>>>>>>> b7c3834bdf1f669516763a47a3cf7b7d2f6b8177
        $truckLat = floatval($truckLat);
        $truckLon = floatval($truckLon);
        
        $distance = distance($truckLat, $truckLon, $userLat, $userLon);
        $body = "For location".$row['address']."\nTruck Location is currently set to:".$truckLocation."\nThe distance is ".$distance." miles\n\nTruck Lat: ".$truckLat."\nTruckLon: ".$truckLon."\nUser Lat:".$userLat."\nuserLon: ".$userLon."\n".$row['lon'];
        
<<<<<<< HEAD
        if ($distance <= 5) {
            mail($row['email'], "Sliders is near you today", $body);
        }
        else {
//            mail($row['email'], "Sliders is not near you today", $body);
=======
        if ($distance <= $within) {
            mail($row['email'], "Sliders is near you today", $body);
        }
        else {
>>>>>>> b7c3834bdf1f669516763a47a3cf7b7d2f6b8177
            
        }
        
    }
    
}
    


 function distance($lat1, $lon1, $lat2, $lon2, $miles = true) {



 $pi80 = M_PI / 180;
	$lat1 *= $pi80;
	$lng1 *= $pi80;
	$lat2 *= $pi80;
	$lng2 *= $pi80;
 
	$r = 6372.797; // mean radius of Earth in km
	$dlat = $lat2 - $lat1;
	$dlng = $lng2 - $lng1;
	$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$km = $r * $c;
     
     return ($miles ? ($km * 0.621371192) : $km);
 }

?>


