 
<?php 
// Connect to the database and fetch information for the page

// $result = get_10_research_list ()

// $pg_intro = get_pg_intro('researchlist');

$research_topics = get_research_list();
$rs_tally = mysqli_num_rows($research_topics);
if ($rs_tally == 0) {
	echo "<br /><label> Unable to retrieve research topics from the Server. <br />";
}
else
{

?>

  
	<h2>Proposed Research Projects</h2>

	  <div class="table-responsive">
      <table class="table table-stripped">
		<tr>
		  <th>SN</th>
		  <th>RESEARCH TOPIC</th>
		  <th>Status</th>
		  <th>View Details</th>
		</tr>
<?php
	
$recno = 0; // initiate record counter to be used as S/N
while ($topic = mysqli_fetch_array($research_topics))
{
	$recno = $recno + 1;
?>
		<tr>
		  <td><?php echo $recno;?></td>
		  <td><a href="index.php?page=project_details&project_id=<?php echo $topic['res_id']; ?>"><?php echo $topic['res_title'];?></a></td>
		  <td><?php echo $topic['res_status'];?></td>
		  <td><a href="index.php?page=project_details&project_id=<?php echo $topic['res_id'];?>">
          	Details</a></td>
		</tr>

<?php }} ?>
</table>
</div>