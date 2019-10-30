$(document).ready(function(){
	
	$("#action").val("InsertData");
	LoadData();
	function LoadData(){

		var action = "Load Data";
		
		$.ajax({
			url: "../includes/action.php", 
			method: "post", 
			data: {action:action}, 
			success: function(data){
				$("#user-data").html(data);
			} 
		});
	
	}

});
