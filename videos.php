<?php
	$page_title = "All Vidoes | TripFootage";
	require_once "header.php";
	$all_videos = getLatestVideos(8);
	foreach ($all_videos as $key => $value) {

	}
?>
	<div class="container-fluid home_content videos_content">
		<div class="row row_heading_space">
			<h4>ALL VIDEOS</h4>
		</div>
		<div class="row row_space">
		<?php
			foreach ($all_videos as $key => $value) {
			?>
				<div class="col-md-3 col-sm-3">
					<a target="_blank" href="<?php echo $value['url']; ?>">
						<img src="img/uploads/<?php echo $value['small_thumb']; ?>" class="latest_img">
						<h5><?php echo substr($value['title'], 0, 38); ?></h5>
					</a>
				</div>
			<?php
			}
			?>
		</div>
		<div id="latest_video_ajax_replace"></div>
		<div class="row row_space">
			<div class="col-md-12 text-center">
				<button onClick="loadMoreVideos()" id="load-more-btn" class="btn btn-success">Load More Old Videos <i class="fa fa-plus" aria-hidden="true"></i></button>
			</div>
		</div>
		
<!-- 		<div class="row row_space">
			<div class="col-md-3 col-sm-3">
				<img src="img/abc.jpg" class="latest_img">
				<h5>mistakes that most Beagle owners make when they are tryi</h5>
			</div>
			<div class="col-md-3 col-sm-3">
				<img src="img/abc2.jpg" class="latest_img">
				<h5>the Free online seminars conducte</h5>
			</div>
			<div class="col-md-3 col-sm-3">
				<img src="img/abc.jpg" class="latest_img">
				<h5 title="Other dog training related web sites and books offer generic information for dogs. However, ours is the ONLY web site that offers information that is specific to"><?php echo substr("Other dog training related web sites and books offer generic information for dogs. However, ours is the ONLY web site that offers information that is specific to", 0, 65) ?></h5>
			</div>
			<div class="col-md-3 col-sm-3">
				<img src="img/abc2.jpg" class="latest_img">
				<h5>the Free online seminars conducte</h5>
			</div>
		</div>        --> 
	</div>


	<br/>
<?php
	require_once "footer.php";
?>
<script type="text/javascript">
	function loadMoreVideos() {
		$.get("fetch-all/?type=load_more_videos", function(data, status) {
			if(data == "NO_DATA") {
				$('#load-more-btn').hide();
			} else {
				document.getElementById('latest_video_ajax_replace').insertAdjacentHTML('beforeend', data);	
			}	        
	    });
	}
</script>