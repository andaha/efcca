<link href="stylesheets/public.css" rel="stylesheet" type="text/css" />
<td width="25%" height="607" id="navigation">
        
<?php 
/*
// if (isset($_SESSION['username']) || !empty($_SESSION['username']))
	  //{
		  echo "<a href=\"site_admin.php\">Site Administration</a>";
		  
//		  echo "<h5>Current User: [  ".$_SESSION['username']."  ]</h5><br /><hr />";

		  echo "<h5>Current User: [  ".$ss_username."  ]</h5><br /><hr />";
		  
	  //} 
*/	  
?>
   <ul>
         <h3>ACADEMY HOME</h3>
        <br />
        <li><a href="CommandantOffc.php">Office of the Commandant</a></li>
        <li><a href="res_index.php">Research and Development</a></li>
        <li><a href="tr_index.php">Training/Career Development</a></li>
  </ul>

     <hr />
   
     <ul>
        <li><a href="StaffList.php">Staff Profiles</a></li>
      <h3>Downloads</h3><br />
        <li><a href="researchphotos.php">Photo Gallery</a></li>
        <li><a href="downloadpg.php">Downloads</a></li>
    </ul>

        <hr />
   
 <!--   <div id="leftpane"> -->
    <ul>
      <h3>Popular Links</h3><br />
        <li><a href="http://hmsrv2.efccnigeria.org:8080/selfservice" target="_blank">Human Manager</a></li>
        <li><a href="http://webmail.efccnigeria.org" target="_blank">Lotus Notes</a></li>
        <li><a href="http://www.efccnigeria.org" target="_blank">EFCC Website</a></li>
        <li><a href="http://www.unodc.org" target="_blank">UNODC Website</a></li>
        <li></li>
  </ul>
      
        <hr />
   
<!--    </div> -->
    
<!--       <div id="leftpane"> -->
<?php
if (!empty($_session['username']) && $_session['username']!="GUEST")
{
 echo "<ul><h3> My Workspace</h3><br /><li><a href=\"mySpace.php\">My WorkSpace</a></li></ul>";
}
?>

<!--          </div>  -->
   
</td>
