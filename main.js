$(document).ready(function(){
        $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
        });

	$.ajax({
		type: "GET",
		url: "getFlocks.php",
		data: {},
		success: function(response){
			$('.trailerWeight').empty();
                        $('.trailerWeight').append('<option value="" id="farm_name">Please Select</option>');
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				$('.trailerWeight').append('<option value="' + data[i].flock_id + '" id="farm_name">' + data[i].farm_name + " - " + data[i].bird_desc + '</option>');
			}
                },
	});

	$("#farm_name").change(function(){
                var delivery_date = $(this).val;
                alert(delivery_date);
		});
        
        
});



        function submitWeight() {
                //var delivery_date = $('#delvDate').val();
                var flock_ID = $('select#farm_name option:checked').val();
                var weight_1 = $('#weight1').val();
                var weight_2 = $('#weight2').val();
                var num_coops = $('#numCoops').val();
                var trailer_num = $('#trailer').val();

                if(flock_ID == "" || weight_1 == "" || num_coops == "" || trailer_num == "" || delivery_date == "")
                {
                alert("Please ensure you select the delivery date, a bird, enter at least weight #1, number of coops weighed, and trailer number.");
                }
                else if (weight_2 == "") {
                weight_2 = 0;

                $.ajax({
                        type: "POST",
                        url: "submitWeights.php",
                        data:{
                        flock_ID : flock_ID,
                        weight_1 : weight_1,
                        weight_2 : weight_2,
                        num_coops : num_coops,
                        trailer_num : trailer_num,
                        delivery_date : delivery_date,
                        },
                        success: function(response){
                        alert(response);
                        }
                });
                }
                else {
                $.ajax({
                        type: "POST",
                        url: "submitWeights.php",
                        data:{
                        flock_ID : flock_ID,
                        weight_1 : weight_1,
                        weight_2 : weight_2,
                        num_coops : num_coops,
                        trailer_num : trailer_num,
                        delivery_date : delivery_date,
                        },
                        success: function(response){
                        alert(response);
                        }
                });

                }
        
        }

function getFlocks(){
	
	$.ajax({
		type: "get",
		url: "getFlocks.php",
		data: {},
		success: function(response){
                        $('.trailerWeight').empty();
                        $('.trailerWeight').append('<option value="">Please Select</option>');
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				$('.trailerWeight').append('<option value="' + data[i].flock_id + '">' + data[i].farm_name +
				' - ' + data[i].bird_desc + '</option>');
			}
		}
	});
}

function showWeights(){

        $.ajax({
                type: "get",
                url: "show_weights.php",
                data: {},
                success: function(response){
                        $('#order_info').empty();
                        var data = $.parseJSON(response);
                        for (var i = 0; i < data.length; i++) {
                                $('#order_info').append("<table><tr>" +
                                        "<th>Store</th>" +
                                        "<th># Coops</th>" +
                                        "<th>Bird</th>" +
                                        "<th>Date</th>" +
                                        "</tr><tr><td>" +
                                        data[i].store + "</td><td>" +
                                        data[i].coops + "</td><td>" +
                                        data[i].bird + "</td><td>" +
                                        data[i].date + "</td></tr></table>");

                        }
                }
        });
}

