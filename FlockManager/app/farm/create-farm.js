$(document).ready(function(){

    // show html form when 'add new farm' button was clicked
    $(document).on('click', '.addFarmButton', function(){
        // we have our html form here where product information will be entered
        // we used the 'required' html5 property to prevent empty fields
        var create_farm_html=`
            <!-- 'farms available' button to show list of farms -->
            <button class='btn btn-primary pull-right m-b-15px showFarmsButton'>Farms Available</button>
            <!-- 'add new farm' html form -->
            <form id='create-farm-form' action='#' method='post' border='0'>
                <table class='table table-hover table-responsive table-bordered'>

                <tr>
                    <td>Farm Name</td>
                    <td><input type='text' name='farm_name' class='form-control' placeholder='Name' required></input></td>
                </tr>

                <tr>
                    <td>Street Address</td>
                    <td><input type='text' name='farm_address' class='form-control' placeholder='Street Address' required></input></td>
                </tr>

                <tr>
                    <td>City</td>
                    <td><input type='text' name='farm_city' class='form-control' placeholder='City' required></input></td>
                </tr>

                <!-- button to submit form -->
                <tr>
                    <td></td>
                    <td>
                        <button type='submit' class='btn btn-primary'>Add New Farm</button>
                    </td>
                </tr>
                </table>
            </form>`;
   
    // inject html to 'page-content' of app
    $("#page-content").html(create_farm_html);
    changePageTitle("Add New Farm");
    });
	
	$(document).on('submit','#create-farm-form', function(){
		// get form data
		var form_data=JSON.stringify($(this).serializeObject());
		console.log(form_data);
		//submit form data to api
		$.ajax({
			url: "http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/FlockManager/api/farm/create.php",
			type : "POST",
			contentType: 'application/json',
			data : form_data,
			success : function(result) {
				// farm was created, go back to farm list
				alert('New Farm Added!');
				showFarms();
			},
			error: function(xhr, resp, text) {
				// show error to console
				 console.log(xhr, resp, text);
		}
	});
		return false;
	
});
});
