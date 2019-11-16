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
                        $('.trailerWeight').append('<option value="" id="farm_name">Please Select Flock</option>');
			var data = JSON.parse(response);
			for (var i = 0; i < data.length; i++) {
				$('.trailerWeight').append('<option value="' + data[i].flock_id + '" id="farm_name">' + data[i].farm_name + " - " + data[i].bird_desc + '</option>');
			}
                },
	});

    
});



        function addWeight(flock_ID, weight_1, weight_2, num_coops, trailer_num, delivery_date) {

                if (flock_ID !=='undefined' || weight_1 !=='undefined' || num_coops !== 'undefined' || trailer_num !== 'undefined' || delivery_date !== 'undefined'){

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
                                alert('addweight if main js');
                                }
                        });
                 } else {
                                alert('Please ensure a Bird is selected, the first weight is entered, the number of coops is enterd, and the trailer number is enterer.');
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

function submitWeight(){
        if ($('#weight2').val() === null){
            addWeight($('#trailerWeight').val(), $('#weight1').val(), 0, $('#numCoops').val(), $('#trailer').val(), $('#delvDate').val());
           }
        else {
            addWeight($('#trailerWeight').val(), $('#weight1').val(), $('#weight2').val(), $('#numCoops').val(), $('#trailer').val(), $('#delvDate').val());
        }

    }