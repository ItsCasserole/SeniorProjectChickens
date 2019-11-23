

$(document).ready(function (){
	
		$.getJSON("api/message/read.php",function(data){
			var messagestr = '<ul class="media-list">';
			$.each(data.records, function(key,val){
				messagestr += `<li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">` + val.timestamp + `</small>
                            <p>` + val.content + `</p>
                        </div>
                    </li>`;
				
			}
			);
			messagestr += `</ul>`;
			$('#announcementBody').append(messagestr);
		});
		
		});



$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
    
	
function postMessage() {
        var flockmanager_flag = $('#flockmanager_flag').val();
        var content = $('#content').val();
        var salesmanager_flag = $('#salesmanager_flag').val();
        var truckdriver_flag = $('#truckdriver_flag').val();
		
	$.ajax({
		type:  "POST",
		url: "create_message.php",
		
		data:{ content : content,
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
	
	function test(){
		alert('test');
	}