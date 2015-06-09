$(document).ready(function(){
	setInterval(function(){
		$.post("get-messages.php", {
			"request" : "check message"
		},
		function(data){
			data = jQuery.parseJSON(data);
			if(lastId < parseInt(data))
			{
				location.reload();
			}
		});
		
		$.post("get-messages.php", {
			"request" : "check users"
		},
		function(data){
			data = jQuery.parseJSON(data);
			if(connectedUsers != parseInt(data))
			{
				location.reload();
			}
		});
	}, 1000);
});