



    function addCustomer(){
        var customerName = $('#customerName').val();
        var customerAddress = $('#customerAddress').val();
        var customerPhone = $('#customerPhone').val();
        //alert("New Customer:\n" + "name: " + customerName + "\naddr: " + customerAddress + "\nphone: " + customerPhone);
        //ajax code -Connor A.
        $.ajax({
        type: "post",
        url: "insert_new_customer.php", //php file goes here
        data:{
            customerName : customerName,
            customerAddress : customerAddress,
            customerPhone : customerPhone,
        },
        success: function(response){
            alert(response);
        }
        
    });
        
        }

    function addTruck(){
        var truckNumber = $('#truckNumber').val();
        var truckVIN = $('#truckVIN').val();
        var truckPlateNumber = $('#truckPlateNumber').val();
        var truckMaxCoops = $('#truckMaxCoops').val();
        var truck_transmission = '';
        if ($('#truckTransmission').val() == "A") {
            truck_transmission = 'Automatic';
        }
        else truck_transmission = 'Manual';

        //alert("New Truck:\n" + "num: " + truckNumber + "\nvin: " + truckVIN + "\nplate: " + truckPlateNumber + "\nmax coops: " + truckMaxCoops + "\ntransmission: " + truck_transmission);
        //ajax code - Connor A
        $.ajax({
        type: "POST",
        url: "insert_new_truck.php", //php file goes here
        data:{
            truckNumber : truckNumber,
            truckVIN : truckVIN,
            truckPlateNumber : truckPlateNumber,
            truckMaxCoops : truckMaxCoops
        },
        success: function(response){
            alert(response);
        }
    });
	alert("got passed ajax");
		

    }
	
	function changeStatus(truck_id){
		alert("Truck Id = " + ('#myCheck').val());
	$.ajax({
		type: "POST",
		url: "augment_status.php",
		data:{
			truck_id : truck_id
		},
		success: function(response){
			alert(response);
		}
	}
		   );
        
       
        
    
}