<?php
	$page_title = "Photo Gallery | TripFootage";
	require_once "header.php";
	$gallery_data = getLatestAlbums(8);
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
		<div id="latest_video_ajax_replace"></div>
		<div class="row row_space">
			<div class="col-md-12 text-center">
				<button onClick="loadMoreAlbums()" id="load-more-btn" class="btn btn-success">Load More Old Videos <i class="fa fa-plus" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
	<br/>
<?php
	require_once "footer.php";
?>
<script type="text/javascript">
	function loadMoreAlbums() {
		$.get("fetch-all/?type=load_more_albums", function(data, status) {
			if(data == "NO_DATA") {
				$('#load-more-btn').hide();
			} else {
				document.getElementById('latest_video_ajax_replace').insertAdjacentHTML('beforeend', data);	
			}	        
	    });
	}
</script>