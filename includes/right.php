<div class="col-sm-3">
        <!-- collapse -->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<!--
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="tourHeading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#tour" aria-expanded="true" aria-controls="tour">
                  <b>Tour of the Academy</b>
                </a>
              </h4>
            </div>
            <div id="tour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tourHeading">
              <div class="panel-body">
              -->

          <div class="panel panel-default">
               <a href="index.php?page=administration">
            <div class="panel-heading"><b>Tour of the Academy</b></div>
            <div class="panel-body">

                
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                  
                    <div class="item active"><img src="images/carousel/2.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/1.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/3.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/4.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/5.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/6.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/7.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/8.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/9.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/10.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/11.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/12.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/13.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/14.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/15.jpg" alt="First slide"></div>
                  
                    <div class="item"><img src="images/carousel/16.jpg" alt="First slide"></div>
                    
                  </div>
                </div>

              </div>
               </a>
           </div>
          <!-- </div> -->

          <hr />
          
<!--
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="announcementsHeading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#announcements" aria-expanded="true" aria-controls="announcements">
                  <b>Announcements</b>
                </a>
              </h4>
            </div>
            <div id="announcements" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="announcementsHeading">
              <div class="panel-body">
              -->
              
          <div class="panel panel-default">
<!--             <div class="panel-heading"><b>Announcements</b></div>
            <div class="panel-body">
 -->                
                <?php

                /*
                            $ann_range = 6;
                            $rs_ann = get_announce($ann_range);
                            // get the number of rows in the result
                            $numrows = mysqli_num_rows($rs_ann);
                            
                            if ($numrows == 0) {
                                echo "<br /><ul  style=\"list-style: none;\"><li><label> No Announcement has been registered yet! </b></label></li></ul><br />";
                            }
                            else
                            
                            echo "<ul style=\"list-style: none;\">";
                            $i=1;
                            while ($ann_row = mysqli_fetch_array($rs_ann))
                            {
                                $ann_id = $ann_row['ann_id'];
                                $ann_title = $ann_row['ann_title'];
                                $ann_date = $ann_row['ann_date'];
                                
                                if (strlen($ann_title)>40)	// strip/truncate the news title to 40 and add '...'
                                {
                                    $ann_title = substr($ann_title,0,36)." ... [".ann_date."]";
                                }
                                
                                echo "<li>";
                                echo "<a href=\"index.php?ann_id=". $ann_id."\">".$ann_title." [".$ann_date."]</a><br>";
                                echo "</li>";
                                
                                $i=$i+1;
                                if($i>$ann_range)
                                break;
                            }
                            if ($numrows>$ann_range)
                            {
                                echo "<br /><br /><a href=\"index.php\">Click here for more ...</a><br /><br />";
                            }

*/

                        ?>
              </div>
            </div>
         <!-- </div> -->

          <hr />
          
<!--
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="newsHeading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#news" aria-expanded="true" aria-controls="news">
                  <b>News</b>
                </a>
              </h4>
            </div>
            <div id="news" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="newsHeading">
              <div class="panel-body">
              -->
          <div class="panel panel-default">
            <div class="panel-heading"><b>News</b></div>
            <div class="panel-body">
                <?php
							
							$news_range = 6;
							$rs_news = get_news($news_range);
							// get the number of rows in the result
							$numrows = mysqli_num_rows($rs_news);

							if ($numrows == 0)  {
								echo "<br /><ul  style=\"list-style: none;\"><li><label> No News has been registered yet! </b></label></li></ul><br />";
							}
							else
							
                echo "<ul style=\"list-style: none;\">";
							$i=1;
							while ($news_row = mysqli_fetch_array($rs_news))
							{
								$news_id = $news_row['news_id'];
								$news_title = $news_row['news_title'];
								$news_date = $news_row['news_date'];
								
								// if (strlen($news_title)>30)	// strip/truncate the news title to 40 and add '...'
								// {
                  // $news_title = substr($news_title,0,30)." ... [".$news_date."]";
                  $news_title = substr($news_title,0,30)." ... ";
								// }
								
								echo "<li>";
								echo "<a href=\"index.php?news_id=". $news_id."\">".$news_title." (".$news_date.")</a><br>";
								echo "</li><br/>";
								
								$i=$i+1;
								if($i>$news_range)
								break;
							}
							if ($numrows>$news_range)
							{
								// echo "<br /><br /><a href=\"index.php\">Click here for more ...</a><br /><br />";
                echo "<br /><br /><a href=\"index.php?page=newslist\">Click here for more ...</a><br /><br />";
							}
                        ?>
              </div>
            </div>
         <!-- </div> -->

<!--
     <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="newsHeading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#news" aria-expanded="true" aria-controls="news">
                  <b>News</b>
                </a>
              </h4>
            </div>
            <div id="news" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="newsHeading">
              <div class="panel-body">

  -->
          <hr />
          <div class="panel panel-default">
            <div class="panel-heading"><b>Events</b></div>
            <div class="panel-body">
              <?php
                  $event_range = 6;
                  $rs_event = get_event($event_range);
                  // get the number of rows in the result
                  $numrows = mysqli_num_rows($rs_event);
                  
                  if ($numrows <> 0)  
                  {
                            echo "<ul style=\"list-style: none;\">";
                          $i=1;
                          $sn=0;
                          while ($event_row = mysqli_fetch_array($rs_event))
                          {
                              $sn=$sn+1;
                              $event_id = $event_row['eventid'];
                              $event_desc = $event_row['event_desc'];
                              $startdate = $event_row['startdate'];
                              
                              if (strlen($event_desc)>40) // strip/truncate the news title to 40 and add '...'
                              {
                                  $event_desc = substr($event_desc,0,36)." ... [".$startdate."]";
                              }
                              
                              echo "<li>";
                              echo "<a href=\"index.php?event_id=". $event_id."\">"
                                  . $event_desc." [".$startdate."]</a><br>";
                              echo "</li><br />";
                              
                              $i=$i+1;
                              if($i>$event_range)
                              break;
                          }
                          if ($numrows>$event_range)
                          {
                              echo "<br /><br /><a href=\"index.php\">Click here for more ...</a><br /><br />";
                          }
                  
                          //echo '</div>';
                  } else {
                            echo "<br /><ul  style=\"list-style: none;\"><li><label> No Event has been registered yet! </b></label></li></ul><br />";
                  }
              ?>
            </div>
          </div>

            <hr />

<!--
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="socialHeading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#social" aria-expanded="true" aria-controls="social">
                  <b>Join our Social Network Pages</b>
                </a>
              </h4>
            </div>
            <div id="social" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="socialHeadin">
              <div class="panel-body">
                             -->

          <div class="panel panel-default">
            <div class="panel-heading"><b>Join our Social Network Pages</b></div>
            <div class="panel-body">

 
                <div id="socialMedia"> 
                            <a href="https://www.facebook.com/efccacademy" target="_blank" title="Find us on Facebook" class="facebook"></a>&nbsp;
                            <a href="https://twitter.com/efccacademy" target="_blank" title="Follow us on Twitter" class="twitter"></a>&nbsp;
                            <a href="" class="googleplus" title="Add us on Google+"></a>&nbsp;
                            <a href="#" target="_blank" class="youtube" title="EFCC Academy Youtube Channel"></a>
                        </div>
                        
              </div>
            </div>
          </div>
          
          </div>
        <hr>
  </div>