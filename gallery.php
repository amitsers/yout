<?php
	$page_title = "Photo Gallery | TripFootage";
	require_once "header.php";
?>
	<div class="container-fluid home_content">
		<div class="row row_heading_space">
			<h4>Photo Gallery</h4>
		</div>
		<div class="row row_space">
			<div class="col-md-3 col-sm-3">
				<a href="images/digha-mandarmani">
					<img src="img/abc.jpg" class="latest_img">
					<h5>Digha Mandarmani</h5>
				</a>
			</div>
			<div class="col-md-3 col-sm-3">
				<img src="img/abc2.jpg" class="latest_img">
				<h5>Murhsidabad<h5>
			</div>
			<div class="col-md-3 col-sm-3">
				<img src="img/abc.jpg" class="latest_img">
				<h5 title="Other dog training related web sites and books offer generic information for dogs. However, ours is the ONLY web site that offers information that is specific to"><?php echo substr("Sundarban", 0, 65) ?></h5>
			</div>
			<div class="col-md-3 col-sm-3">
				<img src="img/abc2.jpg" class="latest_img">
				<h5>the Free online seminars conducte</h5>
			</div>
		</div>
	</div>


	<br/>
<?php
	require_once "footer.php";