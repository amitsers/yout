<?php
	$page_title = "HOME";
	require_once "header.php";
	$corousal_data = getCorousal();
?>
	<div class="header_corousal">
	   <div id="carousel-example" class="carousel slide" data-ride="carousel">
	      <ol class="carousel-indicators">
	         <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
	         <li data-target="#carousel-example" data-slide-to="1"></li>
	         <li data-target="#carousel-example" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner">
	      	<?php
	      		$count = 0;
	      		foreach ($corousal_data as $key => $value) {
	      			if($count==0) {
	      				$is_active = "active";	
	      			} else {
	      				$is_active = "";
	      			}
	      			$count++;
	      			?>
	      				<div class="item <?php echo $is_active; ?>">
				            <a href="#"><img src="<?php echo UPLOAD_URL . 'uploads/' .  $value['thumb']; ?>" /></a>
				            <div class="carousel-caption">
				               <h3><?php echo $value['title']; ?></h3>
				               <?php
				               	if($value['type']=="VIDEO") {
				               		?>
				               			<p id="watch_now_ico">
						               		<a href="<?php echo $value['URL']; ?>" class="btn btn-danger btn-lg">Watch Now <span class="g_icon glyphicon glyphicon-facetime-video"></span></a>
						               	</p>
				               		<?php
				               	} else {
				               		?>
				               			<a href="">View Image Gallery</a>
				               		<?php
				               	}
				               ?>
				               
				            </div>
				        </div>
	      			<?php
	      		}

	      	?>
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

		<div class="latest_video_ajax_replace"></div>

		<div class="row row_heading_space"></div>
		<div class="all_video_ajax_replace"></div>
	</div>	
	<br/>
<?php
	require_once "footer.php";
?>
<script type="text/javascript">
	$.get("fetch-all/?type=latest", function(data, status) {
        $(".latest_video_ajax_replace").html(data);
    });
    $.get("fetch-all/?type=home_all", function(data, status) {
        $(".all_video_ajax_replace").html(data);
    });

// $(window).scroll(function() {
//     if($(window).scrollTop() >= $(document).height() - $(window).height()) {
//           console.log('loadnor');
//     }
// });
</script>