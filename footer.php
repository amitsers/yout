	<hr><br/>
	<?php
		$instagram_data = getInstagramDetails();
		$user_name = $instagram_data->data[0]->user->username;
		$profile_picture = $instagram_data->data[0]->user->profile_picture;
		$full_name = $instagram_data->data[0]->user->full_name;
	?>
	<div class="container-fluid home_content">
		<div class="instagram_main_block">
			<div class="row">
				<div class="col-md-1 col-sm-2 col-xs-2">
					<a href="https://www.instagram.com/<?php echo $user_name; ?>" target="_blank"><img src="<?php echo $profile_picture; ?>" class="insta_profile_pic"></a>	
				</div>
				<div class="col-md-9 col-sm-7 col-xs-5 insta_user_name insta_link">
					<a href="https://www.instagram.com/<?php echo $user_name; ?>" target="_blank"><?php echo $user_name; ?></a>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-5 text-center insta_link">
					<a href="https://www.instagram.com/iammrsinha/"><i class="fa fa-instagram insta_top_corner_logo insta_ico_color" aria-hidden="true"></i><br/>Follow Me On Instagram</a>
				</div>
			</div>
			<div class="row">
				<?php
					$count = 0;
					foreach ($instagram_data->data as $key => $value) {
						if($value->type == 'image') {
							$count++;
							if($count >= 5) break;
							?>

								<div class="col-md-3 col-sm-6 col-xs-12 text-center">
									<div class="insta_post_wrapper">
										<a href="<?php echo $value->link; ?>" target="_blank"><img src="<?php echo $value->images->low_resolution->url; ?>" class="insta_post"></a>
									</div>
									<?php
										if(count($value->users_in_photo) > 0) {
											?>
												<div class="insta_tag_users insta_link">
													<i class="fa fa-user insta_ico_color" aria-hidden="true"></i>&nbsp;
													<?php
													foreach ($value->users_in_photo as $key => $user_data) {
														?>
															<a href="https://www.instagram.com/<?php echo $user_data->user->username; ?>" target="_blank"><?php echo $user_data->user->username; ?></a>&nbsp;
														<?php
													}
													?>
												</div>
											<?php										
										}
									?>
									
									<div class="insta_like_comments insta_link">
										<a href="<?php echo $value->link; ?>" target="_blank">
											<i class="fa fa-heart insta_ico_color" aria-hidden="true"></i> <?php echo $value->likes->count; ?> Likes 
											&nbsp;&nbsp;
											<i class="fa fa-comment insta_ico_color" aria-hidden="true"></i> <?php echo $value->comments->count; ?> Comments 
										</a>
									</div>
								</div>
							<?php
						}
					}
				?>
			</div>
		</div>
		
		<hr><br/>
		<div class="footer_main_block">
			<div class="row social_media_text">
				<div class="col-md-4 col-sm-4 text-center">
					<a href="<?php echo YOUTUBE_URL; ?>">
						<span class="social_icon" style="background-color: #f50000;">
							<i class="fa fa-youtube" aria-hidden="true"></i>
						</span>
						<h4>@<?php echo YOUTUBE; ?></h4>
					</a>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<a href="<?php echo FACEBOOK_URL; ?>">
						<span class="social_icon" style="background-color: #1a04d0;">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</span>
						<h4>@<?php echo FACEBOOK; ?></h4>
					</a>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<a href="<?php echo INSTAGRAM_URL; ?>">
						<span class="social_icon" style="background-color: #6f9fbb;">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</span>
						<h4>@<?php echo INSTAGRAM; ?></h4>
					</a>
				</div>
			</div>
			<br/>
			<hr>
			<br/>
			<div class="footer_links text-center">
				Copyright &copy; <span id="year"></span> <?php echo SITE_NAME; ?>. All rights reserved.
			</div>
		</div>	
	</div>		
	<br/><br/><br/>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async></script>
<script src="https://use.fontawesome.com/65aade2afa.js" async></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#year").html((new Date()).getFullYear());
		$(".show_only_in_mobile").hide();
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			$(".show_only_in_mobile").show();			
		}
		$(".home_content .latest_video_info").css("width", "19%");
		$(".home_content .latest_video_info").css("min-width", "128px");
	})
</script>