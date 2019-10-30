
$(document).ready(function(){
  $("#action").val("InsertData");

  var country_id = $('#countrydd').val();
  get_states(country_id,'#countrydd','#state');
  get_states(country_id,'#comm_country','#comm_state');

  /* Get descriptions from List <SELECT> boxes */
      var CountryHint = $('#countrydd option:selected').text();
      var StateHint = $('#state option:selected').text();
      var LgaHint = $('#lga option:selected').text();

  /* Get corresponding IDs from List <SELECT> boxes */
      var Countryid = $('#countrydd').val();
      var Stateid = $('#state').val();
      var Lgaid = $('#lga').val();

      var LocHint = '';
      var LocFilter = '';

//alert("here");

 // lst_comm is the Button that displays the Location Selection Div (i.e. Countris, States and LGAs)
  $("#lst_comm").on('click', function(){
    var txt1;  
    txt1 = $("#lst_comm").text().trim();    // get the button text
    if(txt1 == 'Show Communities'){
      txt1 = 'Hide Communities';
      //$("lst_community").Show();
      $("#lst_comm").html('<i class="fa fa-list"></i> '+txt1);
      // $("#lst_comm").attr("disabled","disabled");
    } else {
      txt1 = 'Show Communities';
       //$("lst_community").hide();
      $("#lst_comm").html('<i class="fa fa-list"></i> '+txt1);
    }
  });

  $('#apply_location').on('click', function(){

      var country_id = $('#countrydd').val();
      get_states(country_id,'#countrydd','#state');
      get_states(country_id,'#comm_country','#comm_state');

  /* Get descriptions from List <SELECT> boxes */
      var CountryHint = $('#countrydd option:selected').text();
      var StateHint = $('#state option:selected').text();
      var LgaHint = $('#lga option:selected').text();

  /* Get corresponding IDs from List <SELECT> boxes */
      var Countryid = $('#countrydd').val();
      var Stateid = $('#state').val();
      var Lgaid = $('#lga').val();

      var LocHint = '';
      var LocFilter = '';

      if(CountryHint == ''){
        CountryHint="All";
      } else {
        LocFilter = " AND a.country_id = '"+ Countryid+"'";
      }
      
      if(StateHint == ''){
        StateHint="All";
      } else {
        LocFilter = LocFilter + " AND a.state_id = '"+ Stateid+"'";
      }
      if(LgaHint == ''){
        LgaHint ="All";
      } else {
        LocFilter = LocFilter + " AND a.lga_id = '"+ Lgaid+"'";
      }

      LocHint = "Country:  <b>"+CountryHint+"</b>;   State:  <b>"+StateHint+"</b>;   Local Area:  <b>"+LgaHint+"</b>";
      //alert();

//        $('#loc_hint_div').html(LocHint+"<br><small>"+locFilter+"</small>");

      $('#loc_hint_div').html(LocHint+"<br><small>"+LocFilter+"</small>");

//      $('#location_hint').html(LocHint);
//        $('#location_hint').append("<br><small><b>"+locFilter+"</b></small>");


      /*
      
      // Fetch Matching communities (if any)
      $.ajax({
        url: "rset_location.php",
        method: "get",
        data: {country: Countryid, state: Stateid, lga: Lgaid, srchfilter: LocFilter, modl: "GETCOMMUNITIES"},
        success: function(data){
          // add result to Table (#myTbody)
          $('#myTbody').html(data);

        }

      });

      */
  });


  LoadData();
  function LoadData(){
alert("LocHint: "+LocHint);

    var action = "Load Data";
    var filter = LocFilter;
//    alert ("Yes Filter is ="+filter);
    
    $.ajax({
      url: "includes/comm_action.php", 
      method: "post", 
      data: {action:action, filter:filter}, 
      success: function(data){
        $("#comm_data").html(data);
      } 
    });
  
  }


  $(document).on("click", ".edit", function(){
    
    var id = $(this).attr("id");
    //var action = "Edit Data";
    var action = "Fetch Single Data";

    //alert("user_id:  "+user_id);
    //alert("action:  "+action);

    $.ajax({
      url: "includes/comm_action.php",
      method: "post",
      data: {action:action, id:id},
      dataType: "json",
      success: function(data){

        alert(data);

        //$(".collapse").collapse("show");

        $("#first_name").val(data.first_name);
        $("#last_name").val(data.last_name);
        $("#userImage").val(data.user_Image);
        $("#uploaded_image").html(data.html_img);
        $("#submit_btn").val("Edit");
        $("#action").val("Edit");
        $("#user_id").val(user_id);

      } 
    });
  });

  

});


function get_states(val, countrysel, statesel)
{

  var country_id = $(countrysel).val();

  $.ajax({
    url: "rset_location.php",
    method: "POST",
    data: {country_id: country_id, modl: "GETSTATES"},
    dataType: "text",
    success: function(data)
    {
      //$('#state').html(data);
      $(statesel).html(data);
      get_lgas(val, countrysel, statesel, lgasel);
    }
  });
}

function get_lgas(val, countrysel, statesel, lgasel){

  var country_id = $(countrysel).val();
  var state_id = $(statesel).val();

  //    alert("state_id 2: "+state_id);
  //    alert("country_id 2: "+country_id);

  $.ajax({
    url: "rset_location.php",
    method: "POST",
    data: {country_id: country_id, state_id: state_id, modl: "GETLGAS"},
    dataType: "text",
    success: function(data)
    {
      $(lgasel).html(data);
    }
  });
 // }); 
}