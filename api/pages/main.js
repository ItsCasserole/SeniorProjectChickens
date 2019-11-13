$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active')
        });

        hideAll();
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#ordertable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

function hideAll(){
        document.getElementById("form-group-2").style.display = "none";
        document.getElementById("form-group-3").style.display = "none";
        document.getElementById("form-group-4").style.display = "none";
        document.getElementById("form-group-5").style.display = "none";
        document.getElementById("form-group-6").style.display = "none";
        document.getElementById("form-group-7").style.display = "none";
        document.getElementById("form-group-8").style.display = "none";
}

function addOrderLine(){
        if(document.getElementById("form-group-2").style.display == "none"){
                document.getElementById("form-group-2").style.display = "block";
        }
        else if(document.getElementById("form-group-3").style.display == "none"){
                document.getElementById("form-group-3").style.display = "block";
        }
        else if(document.getElementById("form-group-4").style.display == "none"){
                document.getElementById("form-group-4").style.display = "block";
        }
        else if(document.getElementById("form-group-5").style.display == "none"){
                document.getElementById("form-group-5").style.display = "block";
        }
        else if(document.getElementById("form-group-6").style.display == "none"){
                document.getElementById("form-group-6").style.display = "block";
        }
        else if(document.getElementById("form-group-7").style.display == "none"){
                document.getElementById("form-group-7").style.display = "block";
        }
        else if(document.getElementById("form-group-8").style.display == "none"){
                document.getElementById("form-group-8").style.display = "block";
        }
        else {
                alert("No further orders can be added");
        }
}

function getStores(){
	var stores = "../order/getStores.php";
	$.getJSON(stores,function(storeData){


function submitOrder(){
        if($('#deldate').val().match(/^(((0)[0-9])|((1)[0-2]))(\-)([0-2][0-9]|(3)[0-1])(\-)\d{2}$/i) && $('#numcoops').val() != ""){
                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops').val(), $('#bird1').val());
                if(document.getElementById("form-group-2").style.display != "none" && $('#numcoops2').val() != ""){
                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops2').val(), $('#bird2').val());
                        if(document.getElementById("form-group-3").style.display != "none" && $('#numcoops3').val() != ""){
                                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops3').val(), $('#bird3').val());
                                if(document.getElementById("form-group-4").style.display != "none" && $('#numcoops4').val() != ""){
                                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops4').val(), $('#bird4').val());
                                        if(document.getElementById("form-group-5").style.display != "none" && $('#numcoops5').val() != ""){
                                                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops5').val(), $('#bird5').val());
                                                if(document.getElementById("form-group-6").style.display != "none" && $('#numcoops6').val() != "") {
                                                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops6').val(), $('#bird6').val());
                                                        if(document.getElementById("form-group-7").style.display != "none" && $('#numcoops7').val() != "") {
                                                                addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops7').val(), $('#bird7').val());
                                                                if(document.getElementById("form-group-8").style.display != "none" && $('#numcoops8').val() != "") {
                                                                        addOrder($('#storeList').val(), $('#deldate').val(), $('#numcoops8').val(), $('#bird8').val());
                                                                }
                                                        }
                                                }
                                        }
                                }
                        }
                }
                alert("The new order has been added");
                window.location.reload();
        }
        else{
                alert("Invalid or missing date and number of coops.");
        }
}

function addOrder(storeid, deldate, numcoops, flockid){
        //ajax code
        $.ajax({
        type: "post",
        url: "insertOrder.php", //php file goes here
        data:{
            storeid : storeid,
            deldate : deldate,
            numcoops : numcoops,
            flockid : flockid
        },
        success: function(response){
            //alert(response);
        }
    });
}

function removeOrder(id){
        //alert("If this worked, order " + id + " would be removed.");
        $.ajax({
                type: "post",
                url: "removeOrder.php",
                data:{
                        id : id
                },
                success: function(response){
                        //alert(response);
                }
        });
        alert("Removed order # " + id);
        window.location.reload();
}

