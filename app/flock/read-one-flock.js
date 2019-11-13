$(document).ready(function(){

    $(document).on('change','#flockInfo', function(){
        // get flock id
        var id = $(this).find(":selected").val();
        // read farm record based on given ID
        $.getJSON("http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/FlockManager/api/flock/read_one.php?farm_id=" + id, function(data){
            var read_one_flock_html=`
                <!-- when clicked it will show the list of farms -->
                <button class='btn btn-primary pull-right m-b-15px showFlocksButton'>Show All Flocks</button>
                <!-- farm data will be shown in this table -->
			<table class='table table-bordered table-hover'>
                    <tr>
                        <td class='w-30-pct'>Farm Name</td>
                        <td class='w-70-pct'>` + data.farm_name + `</td>
                    </tr>
                    <tr>
                        <td>Building #</td>
                        <td>` + data.building_number + `</td>
                    </tr>
                    <tr>
                        <td>Building Floor</td>
                        <td>` + data.building_floor + `</td>
                    </tr>
                    <tr>
                        <td>Bird Description</td>
                        <td>` + data.bird_desc + `</td>
                    </tr>
                    <tr>
                        <td>Delivery Date</td>
                        <td>` + data.delivery_date + `</td>
                    </tr>
                    <tr>
                        <td>Hatchlings</td>
                        <td>` + data.hatchlings + `</td>
                    </tr>
		
              </table>`;
                // inject html to 'page-content' of app
                $("#page-content").html(read_one_flock_html);

                changePageTitle("Flock Information");

        });
    });

});
