

$(document).ready(function (){
	
		$.getJSON("api/message/read.php",function(data){
			var messagestr = '<ul class="media-list">';
			$.each(data.records, function(key,val){
				messagestr += `<li class="media">
                        <div class="media-body">
                            <strong class="text-primary">Administrator</strong>
                            <small class="text-muted">` + val.timestamp + `</small>
                            <p>` + val.content + `</p>
                        </div>
                    </li>`;
				
			}
			);
			messagestr += `</ul>`;
			$('#announcementBody').append(messagestr);
		});
		
		});

$(document).on('submit','#createMessage', function(){
	var form_data=JSON.stringify($(this).serializeObject());
	$.ajax({
		url: "api/message/create.php",
		type:  "POST",
		contentType: "application/json",
		data: form_data,
		success : function(result){
			alert("message created");
		},
		error:function(xhr,resp,text){
			console.log(xhr,resp,text);
		}
		});
});

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
    