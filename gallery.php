<?php
	$page_title = "Photo Gallery | TripFootage";
	require_once "header.php";
	$gallery_data = getAllAlbums();
?>
	<div class="container-fluid home_content">
		<div class="row row_heading_space">
			<h4>Photo Gallery</h4>
		</div>
		<div class="row row_space">
		<?php 
			foreach ($gallery_data as $key => $value) {
				?>
					<div class="col-md-3 col-sm-3">
						<a href="images/<?php echo $value['name']; ?>">
							<img src="<?php echo UPLOAD_URL . 'uploads/' . $value['small_thumb_file_name']; ?>" class="latest_img">
							<h5><?php echo $value['name']; ?></h5>
						</a>
					</div>
				<?php
			}
		?>
		</div>
	</div>


	<br/>
<?php
	require_once "footer.php";