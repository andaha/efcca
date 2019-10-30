
$(document).ready(function(){

	$("#action").val("InsertData");
	LoadData();
	function LoadData(){

		var action = "Load Data";
		
		$.ajax({
			url: "includes/action.php", 
			method: "post", 
			data: {action:action}, 
			success: function(data){
				$("#user-data").html(data);
			} 
		});
	
	}

	//$("#submit_btn").on("click", function(event){
	$("form").on("submit", function(event){
		
		
		event.preventDefault();

		var quest_tabl = "";
		var resp_tabl = "";
		var options_tabl = "";

		var tna_title = $("#tna_title").val();
		var tna_year = $("#tna_year").val();
        var tna_qtr = $("#tna_qtr").val();
        var tna_cat_id = $("#tna_cat_id").val();
        var tna_approved = $("#tna_approved").val();
        var tna_remark = $("#tna_remark").val();
        var org_id = $("#org_id").val();
		var extension = $("#tna_logo").val().split(".").pop().toLowerCase();

        //var tna_date_reg = $("#tna_date_reg").val(); //is a timestamp. no need


		if(extension != ""){
			if(jQuery.inArray(extension, ["jpg","jpeg","gif","png"]) == -1){
				alert("Invalid Image");
				$("#tna_logo").val("");
				return false;
			}
		}

		if(tna_title != "" && tna_year != ""){
			$.ajax({
				url: "includes/action.php", 
				method: "post",
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data){
					alert(data);
					$("form")[0].reset();
					// LoadData();
					$("#action").val("InsertData");
					$("#submit_btn").val("Insert User");
					$("#uploaded_image").html("");
				}

			});
		} else {
			alert("Both fields are required..");
		}

	});

	$(document).on("click", ".edit", function(){
		
		var tna_id = $(this).attr("id");
		//var action = "Edit Data";
		var action = "Fetch Single Data";

		//alert("tna_id:  "+tna_id);
		//alert("action:  "+action);

		$.ajax({
			url: "includes/action.php",
			method: "post",
			data: {action:action, tna_id:tna_id},
			dataType: "json",
			success: function(data){
				alert(data);

				$(".collapse").collapse("show");
				$("#tna_title").val(data.tna_title);
				$("#tna_year").val(data.tna_year);
				$("#tna_qtr").val(data.tna_qtr);
				$("#tna_cat_id").val(data.tna_cat_id);
				$("#tna_approved").val(data.tna_approved);
				$("#tna_remark").val(data.tna_remark);
				$("#org_id").val(data.org_id);
				$("#extension").val(data.extension);
				$("#tna_date_reg").val(data.tna_date_reg);
				$("#tnalogo").val(data.tna_logo);
				$("#uploaded_image").html(data.html_img);
				$("#submit_btn").val("Edit");
				$("#action").val("Edit");
				$("#tna_id").val(tna_id);

				/* video 1:00:00 */ 
			} 

		});

	});

		$(document).on("click", ".delete", function(){
		var tna_id = $(this).attr("id");
		var action = "Delete Data";
		$.ajax({
			url: "includes/action.php",
			method: "post",
			data: {action:action, tna_id:tna_id},
			success: function (data){
				alert(data);
				LoadData();
			}
		});
	});

});