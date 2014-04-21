<!doctype html>
<html>
<head>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body onload="initialize()">
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