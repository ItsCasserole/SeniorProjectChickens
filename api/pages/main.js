$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active')
        });
	var store = "../store/getStores.php";
	var bird = "../bird/selectBird.php";
	var order = "../order/getOrders.php";
	$.getJSON(store,function(storeData){
                $.getJSON(bird,function(birdData){
                        $.getJSON(order,function(orderData){
                        	var storeStr = '';
                 		$.each(storeData.records, function(key,val){
                         		storeStr+='<option value="' + val.store_id + '">' + val.store_name + '</option>';
                 		});
                 		$('.store').append(storeStr);
                        	var birdStr = '';
                 		$.each(birdData.records, function(key,val){
                         		birdStr+='<option value="' + val.flock_id + '">' + val.bird_desc + '</option>';
                 		});
                 		$('.bird1').append(birdStr);
		 		$('.bird2').append(birdStr);
		 		$('.bird3').append(birdStr);
		 		$('.bird4').append(birdStr);
		 		$('.bird5').append(birdStr);
		 		$('.bird6').append(birdStr);
		 		$('.bird7').append(birdStr);
		 		$('.bird8').append(birdStr);
				var orderStr = '';
				$.each(orderData.records, function(key,val) {
                        		orderStr+='<tr><td>' + val.store + '</td>';
                                	orderStr+='<td>' + val.coops + '</td>';
                                	orderStr+='<td>' + val.bird + '</td>';
                                	orderStr+='<td>' + val.date + '</td>';
                                	orderStr+= '<td class="text-center"><button class="btn btn-sm btn-outline-primary py-0" style="font-size: 0.8em;" type="button" onclick="removeOrder(' + val.id + ')">Remove #' + val.id + '</button></td></tr>';
                		});
				$('#orderTable').append(orderStr);
			});
		});
	});

		 

                  
        hideAll();
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#ordertable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
});

function hideAll(){
        document.getElementById("form-group-2").style.display = "none";
        document.getElementById("form-group-3").style.display = "none";
        document.getElementById("form-group-4").style.display = "none";
        document.getElementById("form-group-5").style.display = "none";
        document.getElementById("form-group-6").style.display = "none";
        document.getElementById("form-group-7").style.display = "none";
        document.getElementById("form-group-8").style.display = "none";
}

function addOrderLine(){
        if(document.getElementById("form-group-2").style.display == "none"){
                document.getElementById("form-group-2").style.display = "block";
        }
        else if(document.getElementById("form-group-3").style.display == "none"){
                document.getElementById("form-group-3").style.display = "block";
        }
        else if(document.getElementById("form-group-4").style.display == "none"){
                document.getElementById("form-group-4").style.display = "block";
        }
        else if(document.getElementById("form-group-5").style.display == "none"){
                document.getElementById("form-group-5").style.display = "block";
        }
        else if(document.getElementById("form-group-6").style.display == "none"){
                document.getElementById("form-group-6").style.display = "block";
        }
        else if(document.getElementById("form-group-7").style.display == "none"){
                document.getElementById("form-group-7").style.display = "block";
        }
        else if(document.getElementById("form-group-8").style.display == "none"){
                document.getElementById("form-group-8").style.display = "block";
        }
        else {
                alert("No further orders can be added");
        }
}


function submitOrder(){
        if($('#deldate').val().match(/^(((0)[0-9])|((1)[0-2]))(\-)([0-2][0-9]|(3)[0-1])(\-)\d{2}$/i) && $('#numcoops').val() != ""){
                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops').val(), $('#bird1').val());
                if(document.getElementById("form-group-2").style.display != "none" && $('#numcoops2').val() != ""){
                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops2').val(), $('#bird2').val());
                        if(document.getElementById("form-group-3").style.display != "none" && $('#numcoops3').val() != ""){
                                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops3').val(), $('#bird3').val());
                                if(document.getElementById("form-group-4").style.display != "none" && $('#numcoops4').val() != ""){
                                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops4').val(), $('#bird4').val());
                                        if(document.getElementById("form-group-5").style.display != "none" && $('#numcoops5').val() != ""){
                                                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops5').val(), $('#bird5').val());
                                                if(document.getElementById("form-group-6").style.display != "none" && $('#numcoops6').val() != "") {
                                                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops6').val(), $('#bird6').val());
                                                        if(document.getElementById("form-group-7").style.display != "none" && $('#numcoops7').val() != "") {
                                                                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops7').val(), $('#bird7').val());
                                                                if(document.getElementById("form-group-8").style.display != "none" && $('#numcoops8').val() != "") {
                                                                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops8').val(), $('#bird8').val());
                                                                }
                                                        }
                                                }
                                        }
                                }
                        }
                }
                alert("The new order has been added");
                window.location.reload();
        }
        else{
                alert("Invalid or missing date and number of coops.");
        }
}

function addOrder(storeid, deldate, numcoops, flockid){
        //ajax code
        $.ajax({
        type: "post",
        url: "../order/insertOrder.php", //php file goes here
        data:{
            "storeid":storeid,
            "deldate":deldate,
            "numcoops":numcoops,
            "flockid":flockid
        },
        success: function(response){
            alert(response);
        },
	failure: function(response){
	    alert("fdjksalfjkdas");
	}
    });
}

function removeOrder(id){
        //alert("If this worked, order " + id + " would be removed.");
        $.ajax({
                type: "post",
                url: "../order/removeOrder.php",
                data:{
                        "id":id
                },
                success: function(response){
                        //alert(response);
                }
        });
        alert("Removed order # " + id);
        window.location.reload();
}

