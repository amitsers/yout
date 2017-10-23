<?php
	$page_title = "HOME | TripFootage";
	$page_name = "index";
	require_once "header.php";
?>
	<div class="header_corousal">
	   <div id="carousel-example" class="carousel slide" data-ride="carousel">
	      <ol class="carousel-indicators">
	         <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
	         <li data-target="#carousel-example" data-slide-to="1"></li>
	         <li data-target="#carousel-example" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner">
	         <div class="item active">
	            <a href="#"><img src="http://placekitten.com/1600/600" /></a>
	            <div class="carousel-caption">
	               <h3>Other dog training related web sites and books offer generic </h3>
	               <p id="watch_now_ico"><a href="" class="btn btn-danger btn-lg">Watch Now <span class="g_icon glyphicon glyphicon-facetime-video"></span></a></p>
	            </div>
	         </div>
	         <div class="item">
	            <a href="#"><img src="http://placekitten.com/1600/600" /></a>
	            <div class="carousel-caption">
	               <h3>How to obedience train your Beagle and end behavioral problems like Aggression, Jumping, Pulling on the Leash</h3>
	               <p>Just Kitten Around</p>
	            </div>
	         </div>
	         <div class="item">
	            <a href="#"><img src="http://placekitten.com/1600/600" /></a>
	            <div class="carousel-caption">
	               <h3>Priority access to the Free online seminars</h3>
	               <p>Just Kitten Around</p>
	            </div>
	         </div>
	      </div>
	      <a class="left carousel-control" href="#carousel-example" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      </a>
	      <a class="right carousel-control" href="#carousel-example" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      </a>
	   </div>
	</div>
	<div class="container-fluid home_content">
		<div class="row row_heading_space">
			<h4>LATEST VIDEOS</h4>
		</div>

		<div class="row row_space">
			<div class="col-md-6 col-sm-6 latest_img_wrapper mouse_hover_share">
				<img src="img/abc.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
			<div class="col-md-6 col-sm-6 latest_img_wrapper">
				<img src="img/abc2.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
		</div>

		<div class="row row_heading_space">
			<h4>ALL VIDEOS</h4>
		</div>
		<div class="row row_space">
			<div class="col-md-4 col-sm-4">
				<img src="img/abc.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<img src="img/abc2.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<img src="img/abc.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title" title="Other dog training related web sites and books offer generic information for dogs. However, ours is the ONLY web site that offers information that is specific to"><?php echo substr("Other dog training related web sites and books offer generic information for dogs. However, ours is the ONLY web site that offers information that is specific to", 0, 65) ?></div>
			</div>
		</div>
		<div class="row row_space">
			<div class="col-md-4 col-sm-4">
				<img src="img/abc.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<img src="img/abc2.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<img src="img/abc.jpg" class="latest_img">
				<div class="latest_video_info">
					<?php socialMediaShare('http://google.com', 'This is message'); ?>
				</div>
				<div class="latest_video_title">This is latest video title</div>
			</div>
		</div>
	</div>


	<br/>
<?php
	require_once "footer.php";