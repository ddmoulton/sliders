<!doctype html>
<html>
<head>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body onload="initialize()">
<<<<<<< HEAD
<form id="locationSetter">
        <input style="width: 100%" name="address" id="autocomplete" placeholder="Enter your address"  type="text"></input>
        <input style="width: 100%" name="address2" id="autocomplete2" placeholder="Confirm your address"  type="text"></input>
        <button id="updateTruckLocation">Update Truck Location</button>
    <button id="sendEmail" disabled>Send Email</button>
</form>



<?php 
    
$cxn = mysqli_connect('localhost', 'root', '', 'test' );
if (!$cxn)
    exit;




// lets setup our insert query
$sql = "SELECT * FROM trucklocation";

// lets run our query
echo $sql; 



$result = mysqli_query( $cxn, $sql);


while($row = $result->fetch_array()) {
   
    if ($row[0] != "" || $row[0] != null) {
    
        $truckLocation = $row[0];
        $truckLat = $row[4];
        $truckLon = $row[5];
        $month = $row[1];
        $date = $row[2];
        $time = $row[3];
    }
}

echo "<div id='truckLocation' class='truckLocation' >".$truckLocation."</div>";
echo "<div id='truckLat' class='truckLat' >".$truckLat."</div>";
echo "<div id='truckLat' class='truckLon' >".$truckLon."</div>";
echo "<div id='month' class='month' >".$date."</div>";
echo "<div id='month' class='date' >".$month."</div>";
echo "<div id='time' class='time' >".$time."</div>";
?>


  <script> 
      
        
        $('#updateTruckLocation').on('click', function(event) {
        
          
            event.preventDefault();
            // this is where it adds to the db.
            var form = $('#locationSetter');
            var pm = false;
            var address = form.find("input[name='address']").val();  
            var confirmAddress = form.find("input[name='address2']").val();
            if ( address === confirmAddress && address != "") {
                  $('#updateTruckLocation').prop('disabled', true);
                new Date($.now());
                var dt = new Date();
                var hours = dt.getHours();
                if (hours > 12) {
                    hours = hours - 12;
                    pm = true;
                }
                var minutes = dt.getMinutes();
                if ( minutes === 0 ) {
                    minutes = 0 + "0";
                }
                else if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                
                if ( pm ) { 
                    pm = "PM";
                }
                else {
                    pm = "AM";
                }
                    
                var time = hours + ":" + minutes + " " + pm;
                var date = dt.getDate();
                var month = dt.getMonth() + 1;
                
                if (month === 1) {
                    month = "January";
                }
                else if (month === 2) {
                    month = "February";
                }
                else if (month === 3) {
                    month = "March";
                }
                else if (month === 4) {
                    month = "April";
                }
                else if (month === 5) {
                    month = "May";
                }
                else if (month === 6) {
                    month = "June";
                }
                else if (month === 7) {
                    month = "July";
                }
                else if (month === 8) {
                    month = "August";
                }
                else if (month === 9) {
                    month = "September";
                }
                else if (month === 10) {
                    month = "October";
                }
                else if (month === 11) {
                    month = "November";
                }
                else if (month === 12) {
                    month = "December";
                }
                
                
                         
                

                             
                $.post('actions/truck_to_db.php', {address: address, month: month, date: date, time: time }, function() {
                    
                    
                }).done(function() {
                    $('#sendEmail').prop('disabled', false);
                }).fail(function() {
                    
                    alert('The post failed. Refresh the page and try again');
                    $('#updateTruckLocation').prop('disabled', true);
                    
                }); 
            
            
            }
            
                
            });
            
            
//            console.log(month);
//            console.log(date);
//            console.log(time);
            
            
            
            
            //  this is where it enables the send mail button.
            
            
  
      
            $("#sendEmail").on('click', function(event) {
             
                $('#sendEmail').prop('disabled', true);
                
                event.preventDefault();

 
                $.post('actions/admin_form_handler.php',  function() {
                       
                }).done(function() {
                    alert('Send successful. Check for a confirmation email');
                }).fail(function() {
                    $('#sendEmail').prop('disabled', true);
                    alert('Send failed.  Reload the page and try again');
                }) });
    
                
                                        
    </script>


        </body>
    <script src="js/maps.js"></script>
</html>
<form  id="locationSetter">
        <input style="width: 100%" name="address" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
        <input style="width: 100%" name="address2" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
    <input type="submit" value="submit">
</form>
        </body>
    <script src="js/maps.js"></script>
</html>
  <script> 
            $("#locationSetter").submit(function(event) {
             
                event.preventDefault();
                
                var $form = $(this);
//                var name = $form.find("input[name='name']").val();
//                var email = $form.find("input[name='email']").val();    
                var address = $form.find("input[name='address']").val();  
                $.post('actions/admin_form_handler.php', {address: address}, function() {
                       
                }).done(function() {
                    console.log("Done");
                }).fail(function() {
                    console.log("fail");
                }) });
    </script>
