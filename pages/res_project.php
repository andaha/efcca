<?php
// Connect to the database and fetch information for the page

// $result = get_10_research_list ()

$research_topics = get_research_list ();
$rs_tally = mysqli_num_rows($research_topics);
if ($rs_tally == 0) {
	echo "<br /><label> Unable to retrieve research topics from the Server. <br />";
}
else
{

?>

<h3>Proposed Research Projects</h3>
The Unit has embarked on the following Research Projects:<br />

<div class="table-responsive">
<table class="table table-stripped">
<?php
	
$recno = 0; // initiate record counter to be used as S/N
while ($row = mysqli_fetch_array($research_topics))
{
	$recno = $recno + 1;
?>
 <tr>
        
   <td><?php echo $recno;?></td>
   <td><a href="index.php?page=project_details&project_id=<?php echo $row['res_id'];?>">
	<?php echo $row['res_title'];?></a></td>
        
</tr>

	<?php if ($recno >= 6) { break; }?>
        
    <?php } ?>
</table>
</div>
<?php
   
    }
    if ($recno < $rs_tally) 
       {
            echo '<p><a href="index.php?page=research_project_list">More Research Projects</a></p>';
       }
    echo "<br /><hr>"
?>