$(document).ready(function(){

	$.ajax({
		type: "GET",
		url: "farm.php",
		data: {},
		success: function(response){
			$('.farmList').empty();

			var data = $.parseJSON(response);
			for (var i = 0; i <= data.length; i++) {
				$('.farmList').append('<option value="' + data[i].farm_id + '">' + data[i].farm_name + '</option>');
			}
		}

	});

	$.ajax({
		type:"GET",
		url: "buildings.php",
		data:{},
		success: function(response){
			$('.buildingList').empty();
			var data = $.parseJSON(response);
			for (var i = 0; i <=data.length; i++) {
				$('.buildingList').append('<option value="' + data[i].building_id + '">Building: ' + data[i].building_number +
					' Floor: ' + data[i].building_floor + '</option>');
				
			}
		}
	});

	$("#farmName").change(function(){
		$.ajax({
			type: 'POST',
			data: {farmName : $('#farmName option:selected').val()}
		});
	});

	$("#building").change(function(){
		$.ajax({
			type: 'POST',
			data: {building : $('#building option:selected').val()}
		});
	});

	$("#farm").change(function(){
		$.ajax({
			type: 'GET',
			url: "getFlock.php",
			data:{farm_id : $('#farm option:selected').val()},
			success: function(response){
				$('#flockInfo').empty();
				var data = $.parseJSON(response);
				for (var i = 0; i < data.length; i++) {
					$('#flockInfo').append("<table><tr>"+
						"<th>Farm Name</th>"+
						"<th>Building #</th>"+
						"<th>Building Floor</th>"+
						"<th>Bird Description</th>"+
						"<th>Unit Sold</th>"+
						"<th># of Hatchlings</th>"+
						"<th>Delivery Date</th>"+
						"</tr><tr><td>"+
						data[i].farm_name + "</td><td>" +
						data[i].building_number +"</td><td>" +
						data[i].building_floor + "</td><td>" +
						data[i].bird_desc  + "</td><td>" +
						data[i].unit_sold +"</td><td>" +
						data[i].hatchlings +"</td><td>" +
						data[i].delivery_date + "</td></tr></table>");
				}
			}
		});
	});

	$("#farmInfo").change(function(){
		$.ajax({
			type: 'GET',
			url: "getFarm.php",
			data:{farm_id : $('#farmInfo option:selected').val()},
			success: function(response){
				$('#nameInfo').empty();
				var data = $.parseJSON(response);
				for (var i = 0; i < data.length; i++) {
					$('#nameInfo').append("<table><tr>" +
						"<th>ID</th>" +
						"<th>Farm Name</th>" +
						"<th>Address</th>" +
						"<th>City</th>" +
						"</tr><tr><td>" +
						data[i].farm_id + "</td><td>" +
						data[i].farm_name + "</td><td>" +
						data[i].farm_address + "</td><td>" +
						data[i].farm_city + "</td></tr></table>");
				}
			}
		});
	});




});

function addFlock(){
	var farmName = $('#farmName').val();
	var building = $('#building').val();
	var delivery = $('#delivery').val();
	var hatchlings = $('#hatchlings').val();
	var breed = $('#breed').val();
	var unit = $("input[name='unit']:checked").val();
	console.log(farmName);
	console.log(building);
	console.log(unit);
	console.log(delivery);
	console.log(hatchlings);
	console.log(breed);


	$.ajax({
		type: "POST",
		url: "addFlock.php",
		data: {
			farmName : farmName,
			building : building,
			delivery : delivery,
			hatchlings : hatchlings,
			breed : breed,
			unit : unit
		},
		success: function(response) {
			alert(response);
			location.reload(true);
		}
	});
}

function addFarm(){
	var farm_name = $('#farmName').val();
	var farm_address = $('#farmAddress').val();
	var farm_city = $('#farmCity').val();
	
	$.ajax({
		type: "POST",
		url: "addFarm.php",
		data: {
			farm_name : farm_name,
			farm_address : farm_address,
			farm_city : farm_city
		},
		success: function(response) {
			alert(response);
		        location.reload(true);
		}
	});
	
}

function showFlocks(){
	$.ajax({     
		type: "GET",
		url: "showFlocks.php",
		data: {},
		success: function(response){
			$('#flockInfo').empty();
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				$('#flockInfo').append("<table>"+
					"<tr>"+
					"<th>Farm Name</th>"+
					"<th>Building #</th>"+
					"<th>Building Floor</th>"+
					"<th>Bird Description</th>"+
					"<th>Unit Sold</th>"+
					"<th># of Hatchlings</th>"+
					"<th>Delivery Date</th>"+
					"</tr>"+
					"<tr><td>" +
					data[i].farm_name + "</td><td>" +
					data[i].building_number +"</td><td>" +
					data[i].building_floor + "</td><td>" +
					data[i].bird_desc  + "</td><td>" +
					data[i].unit_sold +"</td><td>" +
					data[i].hatchlings +"</td><td>" +
					data[i].delivery_date + "</td></tr></table>");
			} 
		}
	});
}

function showFarms(){
	$.ajax({
                type: "GET",
                url: "showFarms.php",
                data:{},
                success: function(response){
                $('#nameInfo').empty();
                var data = $.parseJSON(response);
                for (var i = 0; i < data.length; i++) {
                        $('#nameInfo').append("<table><tr>" +
                               "<th>ID</th>" +
                               "<th>Farm Name</th>" +
                               "<th>Address</th>" +
                               "<th>City</th>" +
                               "</tr><tr><td>" +
                               data[i].farm_id + "</td><td>" +
                               data[i].farm_name + "</td><td>" +
                               data[i].farm_address + "</td><td>" +
                               data[i].farm_city + "</td></tr></table>");
                          }
                  }
        });
}













