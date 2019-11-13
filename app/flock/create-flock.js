$(document).ready(function(){

    // show html form when 'add new flock' button was clicked
    $(document).on('click', '.addFlockButton', function(){
        // load list of farms, buildings, and birds
	var farm = "http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/SeniorProjectChickens/FlockManager/api/farm/read.php";
	var bird = "http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/SeniorProjectChickens/FlockManager/api/bird/read.php";
	var building = "http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/SeniorProjectChickens/FlockManager/api/building/read.php";
        $.getJSON(farm, function(farmData){
		$.getJSON(bird, function(birdData){
			$.getJSON(building, function(buildingData){
            // build farm option html
            var farm_options_html=`<select name='farm_id' class='form-control'>`;
            $.each(farmData.records, function(key,val){
                farm_options_html+=`<option value='` + val.farm_id + `'>` + val.farm_name + `</option>`;
            });
            farm_options_html+=`</select>`;

            // build building option html
            var building_options_html=`<select name='building_id' class='form-control'>`;
            $.each(buildingData.records, function(key,val){
                building_options_html+=`<option value='` + val.building_id + `'>Building: ` + val.building_number
                + ` Floor: ` + val.building_floor + `</option>`;
            });
            building_options_html+=`</select>`;

            // build farm option html
            var bird_options_html=`<select name='bird_type_id' class='form-control'>`;
            $.each(birdData.records, function(key,val){
                bird_options_html+=`<option value='` + val.bird_type_id + `'>` + val.bird_desc + `</option>`;
            });
            bird_options_html+=`</select>`;

        // we have our html form here where flock information will be entered
        // we used the 'required' html5 property to prevent empty fields
        var create_flock_html=`
            <!-- 'manage flocks' button to show list of products -->
            <button class='btn btn-primary pull-right m-b-15px showFlocksButton'>Flocks Available</button>
            
            <!-- 'add new flock' html form -->
            <form id='create-flock-form' action='#' method='post' border='0'>
                <table class='table table-hover table-responsive table-bordered'>

                <tr>
                    <td>Farm Name</td>
                    <td>` + farm_options_html + `</td>
                </tr>

                <tr>
                    <td>Building</td>
                    <td>` + building_options_html +`</td>
                </tr>

                <tr>
                    <td>Delivery Date</td>
                    <td><input type='date' name='delivery_date' class='form-control'  required></input></td>
                </tr>

                <tr>
                    <td>No. of Hatchlings</td>
                    <td><input type='number' name='hatchlings' class='form-control' placeholder='Enter hatchlings' required></input></td>
                </tr>

                <tr>
                    <td>Breed Description</td>
                    <td>` + bird_options_html +`</td>
                </tr>

                <!-- button to submit form -->
                <tr>
                    <td></td>
                    <td>
                        <button type='submit' class='btn btn-primary'>Add New Flock</button>
                    </td>
                </tr>
                </table>
            </form>`;
    
    // inject html to 'page-content' of app
    $("#page-content").html(create_flock_html);
    changePageTitle("Add New Flock");
    });
    });
	});
    });
    $(document).on('submit', '#create-flock-form', function(){
        // get form data
        var form_data=JSON.stringify($(this).serializeObject());
	    console.log(form_data);

        //submit form data to api
        $.ajax({
                url: "http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/FlockManager/api/flock/create.php",
                type : "POST",
                contentType: 'application/json',
                data : form_data,
                success : function(result) {
                        // farm was created, go back to farm list
			console.log(result);
			alert('New Flock Added!');
                        showFlocks();
                },
                error: function(xhr, resp, text) {
                        // show error to console
                         console.log(xhr, resp, text);
			 
                }
        });
        return false;
    });

});
