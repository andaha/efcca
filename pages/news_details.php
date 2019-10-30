<?php
	if(isset($_REQUEST['news_id'])) {
		$news_page = $_GET['news_id'];
		
		$news_page_query = "SELECT * FROM `tbl_news` WHERE `news_id`=$news_page";
		$news_page_result = mysqli_query($db_conn, $news_page_query) or die(mysqli_error());
		$news = mysqli_fetch_assoc($news_page_result);
		
		echo "<h2>".$news['news_title']."</h2>";
		echo "<p>".$news['news_text']."</p>";
	}
?>