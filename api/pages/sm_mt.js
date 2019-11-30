 function postMessage() {
        
        var messageContent = $('#messageContent').val();
        var salesmanager_flag;
        var truckdriver_flag;
        var flockmanager_flag;
        if ($('#salesmanager_flag').is(":checked")){
         salesmanager_flag = 1;
        }
        else{
         salesmanager_flag = 0;
        }
        
        if ($('#truckdriver_flag').is(":checked")){
         truckdriver_flag = 1;
        }
        else{
         truckdriver_flag = 0;
        }
        if ($('#flockmanager_flag').is(":checked")){
         flockmanager_flag = 1;
        }
        else{
         flockmanager_flag = 0;
        }
        
	$.ajax({
		type:  "POST",
		url: "../message/create_message.php",
		
		data:{ content : messageContent,
		flockmanager_flag : flockmanager_flag,
		salesmanager_flag : salesmanager_flag,
		truckdriver_flag : truckdriver_flag
		},
  
		success : function(result){
			alert("message created");
		},
		error:function(xhr,resp,text){
			console.log(xhr,resp,text);
		}
		});
  }
  
      function addTruck(){
        var truckNumber = $('#truckNumber').val();
        var truckVIN = $('#truckVIN').val();
        var truckPlateNumber = $('#truckPlateNumber').val();
        var truckMaxCoops = $('#truckMaxCoops').val();
        var customerZip = $('#customerZip').val();
        var truck_transmission = '';
        if ($('#truckTransmission').val() == "A") {
            truck_transmission = 'Automatic';
        }
        else truck_transmission = 'Manual';

        //alert("New Truck:\n" + "num: " + truckNumber + "\nvin: " + truckVIN + "\nplate: " + truckPlateNumber + "\nmax coops: " + truckMaxCoops + "\ntransmission: " + truck_transmission);
        //ajax code - Connor A
        $.ajax({
        type: "POST",
        url: "../truck/addTruck.php", //php file goes here
        data:{
            truckNumber : truckNumber,
            truckVIN : truckVIN,
            truckPlateNumber : truckPlateNumber,
            truckMaxCoops : truckMaxCoops,
            customerZip : customerZip
        },
        success: function(response){
            alert(response);
        }
    });
	alert("got passed ajax");
		

    }
          function addDriver(){
        var truckNumber = $('#driverFirst').val();
        var truckVIN = $('#driverLast').val();
        var truckPlateNumber = $('#driver').val();
        var truckMaxCoops = $('#truckMaxCoops').val();
        var customerZip = $('#customerZip').val();
        var truck_transmission = '';
        if ($('#truckTransmission').val() == "A") {
            truck_transmission = 'Automatic';
        }
        else truck_transmission = 'Manual';

        //alert("New Truck:\n" + "num: " + truckNumber + "\nvin: " + truckVIN + "\nplate: " + truckPlateNumber + "\nmax coops: " + truckMaxCoops + "\ntransmission: " + truck_transmission);
        //ajax code - Connor A
        $.ajax({
        type: "POST",
        url: "../truck/addTruck.php", //php file goes here
        data:{
            truckNumber : truckNumber,
            truckVIN : truckVIN,
            truckPlateNumber : truckPlateNumber,
            truckMaxCoops : truckMaxCoops,
            customerZip : customerZip
        },
        success: function(response){
            alert(response);
        }
    });
	alert("got passed ajax");
		

    }
    
        function addCustomer(){
        var customerName = $('#customerName').val();
        var customerAddress = $('#customerAddress').val();
        var customerPhone = $('#customerPhone').val();
        var customerZip = $('#customerZip').val();
        var customerCity = $('#customerCity').val();
        //alert("New Customer:\n" + "name: " + customerName + "\naddr: " + customerAddress + "\nphone: " + customerPhone);
        //ajax code -Connor A.
        $.ajax({
        type: "post",
        url: "../store/addStore.php", //php file goes here
        data:{
            customerName : customerName,
            customerAddress : customerAddress,
            customerPhone : customerPhone,
            customerZip : customerZip,
            customerCity : customerCity
        },
        success: function(response){
            alert(response);
        }
        
    });
        
        }
  
  function logout(){
    docCookies.removeItem("username");
    docCookies.removeItem("userid");
    docCookies.removeItem("permission");
    docCookies.removeItem("firstname");
    docCookies.removeItem("lastname");
    window.location.href = "login.html";
}


function loggedin(){
	    if(docCookies.getItem("userid") == null &&
		           window.location.href.indexOf("login.html") == -1){
		    	window.location.href = "login.html";
		        }
	    else if(docCookies.getItem("userid") != null &&
		    	    window.location.href.indexOf("login.html") != -1){
		    	redirectOnPermissions();	
		        }
}