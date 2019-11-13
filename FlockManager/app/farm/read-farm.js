$(document).ready(function(){
    // show list of farm on first load
    
    $(document).on('click', '.showFarmsButton', function(){
        showFarms();
    });
});

function showFarms(){
    // get list of farms from the API
    $.getJSON("http://ec2-18-207-195-213.compute-1.amazonaws.com/Brian/FlockManager/api/farm/read.php", function(data){
        // build farm name option html
        //loop through returned list of data
        var farm_options_html = `<select id='farmInfo'  name='farm_id' class='form-control'>`;
	farm_options_html+=`<option value=''>Choose From Available Farms</option>`;    
        $.each(data.records, function(key,val){
            farm_options_html+=`<option value='` + val.farm_id + `'>` + val.farm_name + `</option>`;
        });
        farm_options_html+=`</select><br>`;

        // we have our html form here where product information will be entered
        // we used the 'required' html5 property to prevent empty fields
        var read_farms_html=`
        <!-- 'manage flocks' button to go to flock page -->
        <button class="btn btn-primary pull-right m-b-15px showFlocksButton">Manage Flocks</button> ` +
        farm_options_html +`
        <!-- when clicked, it will load the available farms table -->
        <button  class="btn btn-primary pull-right m-b-15px addFarmButton">Add New Farm</button>
        <!-- start table -->
        <table class='table table-bordered table-hover'>
 
        <!-- creating our table heading -->
            <tr>
                <th class='w-5-pct'>ID</th>
                <th class='w-10-pct'>Farm Name</th>
                <th class='w-15-pct'>Farm Address</th>
                <th class='w-15-pct'>Farm City</th>
            </tr>`;
     
    // loop through returned list of data
    $.each(data.records, function(key, val) {
 
    // creating new table row per record
    read_farms_html+=`
        <tr>
 
            <td>` + val.farm_id + `</td>
            <td>` + val.farm_name + `</td>
            <td>` + val.farm_address + `</td>
            <td>` + val.farm_city + `</td>
            </tr>`;
    });
// end table
read_farms_html+=`</table>`;
    
//inject to 'page-content' of our app
$('#page-content').html(read_farms_html);

// change page title
changePageTitle("Manage Farms");
});
    
}
