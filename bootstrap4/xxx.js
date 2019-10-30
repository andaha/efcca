  
  var country_id = $('#countrydd').val();
  get_states(country_id,'#countrydd','#state');
  get_states(country_id,'#comm_country','#comm_state');

  //  alert(LocHint);

  //Bootstrap Data Table
  $('#dtable').DataTable({
      "oLanguage": {
          "sEmptyTable":     "No Records Found",
          "sInfo":           "Showing _START_ to _END_ of _TOTAL_ entries",
          "sInfoEmpty":      "Showing 0 to 0 of 0 entries",
          "sInfoFiltered":   "(filtered from _MAX_ total entries)",
          "sInfoPostFix":    "",
          "sInfoThousands":  ",",
          "sLengthMenu":     "Show  _MENU_     Entries",
          "sLoadingRecords": "Loading...",
          "sProcessing":     "Processing...",
          "sSearch":         "<strong>Filter: </strong>",
          "sZeroRecords":    "No Records Found",
          "oPaginate": {
              "sFirst":    " |< First ",
              "sLast":     " Last >| ",
              "sNext":     " Next > ",
              "sPrevious": " < Prev "
          }
      },
      "pageLength": 10,
      "order": [
          [ 0, "asc" ]
      ],
      "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
      ],        "stateSave": true
  });

  $(".dataTables_filter input"){
    .attr("placeholder", "Enter Keyword...");
    .attr("size", "50");
  }

/*

      // highlight remembered filter on page re-load
  var rememberedFilterTerm = table.state().columns[2].search.search;

  if (rememberedFilterTerm) {
      $(".view-filter-btns a span").each(function(index) {
          if ($(this).text().trim() == rememberedFilterTerm) {
              $(this).parent('a').addClass('active');
              $(this).parent('a').find('i').switchClass('fa-circle-o', 'fa-dot-circle-o', 0);
          }
      });

      }

*/

  //End Bootstrap Data Table

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
          LocFilter = " AND country_id = '"+ Countryid+"'";
        }
        
        if(StateHint == ''){
          StateHint="All";
        } else {
          LocFilter = LocFilter + " AND state_id = '"+ Stateid+"'";
        }
        if(LgaHint == ''){
          LgaHint ="All";
        } else {
          LocFilter = LocFilter + " AND lga_id = '"+ Lgaid+"'";
        }

        LocHint = "Country:<b>"+CountryHint+"</b>;   State:<b>"+StateHint+"</b>;   Local Area:<b>"+LgaHint+"</b>";
        $('#location_hint').html(LocHint+"<br><small><b>"+locFilter+"</b></small>");

//        $('#location_hint').html(LocHint);
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
