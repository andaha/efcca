<?php
$album_name=$_GET['album'];
$album_id = $_GET['photo_album'];

$gallery_photos_query="SELECT * FROM gallery_photos WHERE photo_album=$album_id AND visible=1";

if(isset($album_id)) {
	$gallery_photos_result = mysqli_query($db_conn, $gallery_photos_query) or die(mysqli_error());
	$rs_photo = mysqli_fetch_assoc($gallery_photos_result);
}

?>

<div class="row">
	<div class="col-md-12">
		<h2><?php echo $album_name; ?></h2>                            
		<div class="row">
			<?php if ((isset($_GET['photo_album'])) && (!empty($_GET['photo_album'])) && ($_GET['page'] == "photos")) { ?>
			<?php do { $photo = $rs_photo['photo_filename']; ?>

			<a href="images/gallery/photos/<?php echo $rs_photo['photo_filename']; ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php echo $rs_photo['photo_caption']; ?>" class="col-sm-2">
				<img src="images/gallery/photos/<?php echo $rs_photo['photo_filename']; ?>" class="img-responsive" alt="<?php echo $rs_photo['photo_caption']; ?>">
			</a>
			<?php } while($rs_photo = mysqli_fetch_assoc($gallery_photos_result)); ?>
<?php } else {
echo "Please, go back and select an \"Album\" to display its photos";
} ?>
		</div>
	</div>
</div>
                    
<div class="clear"><a href="index.php?page=photo_gallery" title="Go back to Album">&lt;&lt; BACK</a></div>
	
<div class="clear"></div>