<?php
$gallery_album_query="SELECT * FROM gallery_album WHERE visible=1";

if($_GET['page'] == "photo_gallery") {
	$gallery_album_result = mysqli_query($db_conn, $gallery_album_query) or die(mysqli_error());
	$rs_album = mysqli_fetch_assoc($gallery_album_result);
	$numRows = mysqli_num_rows($gallery_album_result);
}
?>

<div class="row">
    <?php
        if ((isset($_GET['page'])) && ($_GET['page'] == "photo_gallery")) {
            do {
                $albumid = $rs_album['album_id'];
                $album = $rs_album['album_name'];
                $thumbnail = $rs_album['album_thumb']; ?>
                <?php if($numRows != 0) { ?>
                    <div class="col-md-3 col-sm-4 col-xs-6"><a href="index.php?page=photos&photo_album=<?php echo $albumid; ?>&album=<?php echo $album; ?>"><img class="img-responsive" src="images/gallery/album_thumb/<?php echo $thumbnail; ?>" /><?php echo $album; ?></a></div>
                <?php } ?>
    <?php } while($rs_album = mysqli_fetch_assoc($gallery_album_result)); ?>
    <?php
        } else {
            echo "EFCC is watching you. Anywhere. Any time.";
        }
    ?>
</div>