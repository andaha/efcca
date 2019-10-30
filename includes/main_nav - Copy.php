<link href="../stylesheets/public.css" rel="stylesheet" type="text/css" />
<td width="25%" height="607" id="navigation">
<?php
      /* 
 	echo "<a href=\"site_admin.php\">Site Administration</a>";
	
	if (isset($_SESSION['username']) && !empty($_SESSION['username']))
	  {
		  if (!empty($_SESSION['fullname'])) 
		  {
				echo "<h5><i> Welcome ". $_SESSION['fullname']."!</i></h5>";
		  }else{
			  	echo "<h5>Current User: [  ".strtoupper($_SESSION['username'])."  ]</h5>";
		  }
	  } 

    echo "<hr />";
	*/
?>   
	<ul>
         <h3>ACADEMY HOME</h3>
        <br />
        <!-- <li><a href="CommandantOffc.php">Office of the Commandant</a></li> -->
        <li><a href="res_index.php">Research and Development</a></li>
        <li><a href="tr_index.php">Training/Career Development</a></li>
        <li><a href="collab_index.php">Partnership/Collaboration</a></li>
        <li><a href="eclar_index.php">Economic Law Report Secretariat</a></li>
  </ul>

     <hr />
   
     <ul>
     <!-- <h3>Downloads</h3><br /> -->
        <li><a href="researchphotos.php">Events/Success Stories</a></li>
        <li><a href="downloadpg.php">Downloads</a></li>
    </ul>

        <hr />
   
 <!--   <div id="leftpane"> -->
    <ul>
      <h3>Quick Links</h3><br />
        <li><a href="http://hmsrv2.efccnigeria.org:8080/selfservice" target="_blank">Human Manager</a></li>
        <li><a href="http://webmail.efccnigeria.org" target="_blank">Lotus Notes</a></li>
        <li><a href="http://www.efccnigeria.org" target="_blank">EFCC Website</a></li>
        <li><a href="http://www.unodc.org" target="_blank">UNODC Website</a></li>
        <hr />
		<h3>Newspapers</h3><br />
        <li><a href="http://www.onlinenewspapers.com " target="_blank">Online Newspapers</a></li>
        <li><a href="http://www.nigeriamasterweb.com/paperfrmes.html" target="_blank">Nigerian Newspapers</a></li>
       <br />
       <li></li>
  </ul>
      
        <hr />
   
<!--    </div> -->
    
<!--       <div id="leftpane"> -->
<?php
//if (!empty($_session['username']) && $_session['username']!="GUEST")
//{
 //echo "<ul><h3> My Workspace</h3><br /><li><a href=\"mySpace.php\">My WorkSpace</a></li></ul>";
//}
?>

<!--          </div>  -->
   
</td>
