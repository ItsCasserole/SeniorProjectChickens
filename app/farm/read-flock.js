$(document).ready(function(){
    // show html form when 'Manage flocks' button was clicked
    $(document).on('click', '#showFlocksButton', function(){
    // get list of flocks from the API
    $.getJSON("http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/FlockManager/api/flock/read.php", function(data){
        // build farm name option html
        //loop through returned list of data
        var flock_options_html = `<select id='flockInfo'  name='farm_id' class='form-control'>`;
        $.each(data.records, function(key,val){
            flock_options_html+=`<option value='` + val.farm_id + `'>` + val.farm_name + `</option>`;
        });
        flock_options_html+=`</select><br>`;
        
        // we have our html form here where flock information will be entered
        // we used the 'required' html5 property to prevent empty fields
        var read_flocks_html=`
        <!-- 'manage farms' button to go to farm page -->
        <button id="showFarmsButton" class="btn btn-primary pull-right m-b-15px">Manage Farms</button> ` +
        flock_options_html +`
        <!-- when clicked, it will load the add new flock table -->
        <button id="addFlockButton" class="btn btn-primary pull-right m-b-15px">Add New Flock</button>
        <!-- start table -->
        <table class='table table-bordered table-hover'>

        <!-- creating our table heading -->
            <tr>
                <th class='w-10-pct'>Farm Name</th>
                <th class='w-5-pct'>Building #</th>
                <th class='w-15-pct'>Building Floor</th>
                <th class='w-15-pct'>Bird Description</th>
                <th class='w-15-pct'>Delivery Date</th>
            </tr>`;

    // loop through returned list of data
$.each(data.records, function(key, val) {

    // creating new table row per record
    read_flocks_html+=`
        <tr>
            <td>` + val.farm_name + `</td>
            <td>` + val.building_number + `</td>
            <td>` + val.building_floor + `</td>
            <td>` + val.bird_desc + `</td>
            <td>` + val.hatchlings + `</td>
            <td>` + val.delivery_date + `</td>
            </tr>`;
});
// end table
read_flocks_html+=`</table>`;


//inject to 'page-content' of our app
$("#page-content").html(read_flocks_html);

// change page title
changePageTitle("Manage Flocks");

});

});
});
