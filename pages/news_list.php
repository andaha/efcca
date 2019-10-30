<?php
	// if(isset($_REQUEST['news_id'])) {
	// 	$news_page = $_GET['news_id'];
		
	// 	$news_page_query = "SELECT * FROM `tbl_news` WHERE `news_id`=$news_page";
	// 	$news_page_result = mysqli_query($db_conn, $news_page_query) or die(mysqli_error());
	// 	$news = mysqli_fetch_assoc($news_page_result);
		
	// 	echo "<h2>".$news['news_title']."</h2>";
	// 	echo "<p>".$news['news_text']."</p>";
	// }
?>
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
				echo "</li>";
				
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
