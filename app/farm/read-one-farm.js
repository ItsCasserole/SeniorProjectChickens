$(document).ready(function(){

    $(document).on('change','#farmInfo', function(){
        // get farm id
        var id = $(this).find(":selected").val();
        // read farm record based on given ID
        $.getJSON("http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/FlockManager/api/farm/read_one.php?farm_id=" + id, function(data){
            var read_one_farm_html=`
                <!-- when clicked it will show the list of farms -->
                <button class='btn btn-primary pull-right m-b-15px showFarmsButton'>Show All Farms</button>
                
	        <!-- farm data will be shown in this table -->
                <table class='table table-bordered table-hover'>
                    <tr>
                        <td class='w-30-pct'>Farm Name</td>
                        <td class='w-70-pct'>` + data.farm_name + `</td>
                    </tr>
                    <tr>
                        <td>Street Address</td>
                        <td>` + data.farm_address + `</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>` + data.farm_city + `</td>
                    </tr>
                </table>`;

                // inject html to 'page-content' of app
                $("#page-content").html(read_one_farm_html);

                changePageTitle("Farm Information");

        });
    });

});
