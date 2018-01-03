<?php
	require_once 'mysqli-conn.php';
	require_once 'common.php';
	$conn = new DBConn();
	session_start();
	if(isset($_GET['type']) && $_GET['type']=="latest") {
		$first_two_videos_query = $conn->query("SELECT v.id video_id , v.*, r.* FROM videos v, rides r WHERE r.id=v.ride_id ORDER BY v.upload_date DESC LIMIT 2");
		?>
		<div class="row row_space latest_video">
			<?php
				while ($row = $first_two_videos_query->fetch_array()) {
					$_SESSION['latest_last_video_id'] = $row['video_id'];
					?>
						<div class="col-md-6 col-sm-6 latest_img_wrapper mouse_hover_share">
							<a target="_blank" href="<?php echo $row['url']; ?>"><img src="<?php echo UPLOAD_URL . 'uploads/' . $row['large_thumb']; ?>" class="latest_img"></a>
							<div class="latest_video_info">
								<?php socialMediaShare($row['url'], $row['description']); ?>
							</div>
							<div class="latest_video_title"><?php echo $row['title']; ?></div>
						</div>
					<?php
				}
			?>
		</div>
		<?php
	} elseif(isset($_GET['type']) && ($_GET['type']=="all") && (isset($_GET['max']))) {
		session_start();
		if(!isset($_SESSION['last_vid']) || (isset($_SESSION['last_vid']) && $_SESSION['last_vid']=="")) {
			$last_vid = 1; // any fix value to load first time
		}
		if(isset($_SESSION['last_vid']) && ($_SESSION['last_vid'] != "")) {
			$last_vid = $_SESSION['last_vid'];
		}
		$limit = $conn->mysqli_real_escape_string($_GET['max']);
		$videos_query = $conn->query("SELECT max(v.id) max_id, v.id video_id , v.*, r.* FROM videos v, rides r WHERE r.id=v.ride_id AND v.id>$last_vid ORDER BY v.upload_date LIMIT $limit");
		echo "SELECT max(v.id) max_id, v.id video_id , v.*, r.* FROM videos v, rides r WHERE r.id=v.ride_id AND v.id>$last_vid ORDER BY v.upload_date LIMIT $limit";
		exit;
		?>
		<div class="row row_space">
			<?php
				while ($row = $videos_query->fetch_array()) {
					$data[] = $row;
					?>
						<div class="col-md-4 col-sm-4">
							<a target="_blank" href="<?php echo $row['url']; ?>"><img src="<?php echo UPLOAD_URL . 'uploads/' . $row['small_thumb']; ?>" class="latest_img"></a>
							<div class="latest_video_info">
								<?php socialMediaShare($row['url'], $row['description']); ?>
							</div>
							<div class="latest_video_title"><?php echo $row['title']; ?></div>
						</div>
					<?php
				}
			?>
		</div>
		<?php
	} elseif(isset($_GET['type']) && ($_GET['type']=="home_all")) {
		if(isset($_SESSION['latest_last_video_id'])) {
			$latest_last_video_id = $_SESSION['latest_last_video_id'];
		}
		$videos_query = $conn->query("SELECT v.id video_id , v.*, r.* FROM videos v, rides r WHERE r.id=v.ride_id AND v.id<$latest_last_video_id ORDER BY v.upload_date DESC LIMIT 6");
		?>
		<div class="row row_space">
			<?php
				while ($row = $videos_query->fetch_array()) {
					?>
						<div class="col-md-4 col-sm-4">
							<a target="_blank" href="<?php echo $row['url']; ?>"><img src="<?php echo UPLOAD_URL . 'uploads/' . $row['small_thumb']; ?>" class="latest_img"></a>
							<div class="latest_video_info">
								<?php socialMediaShare($row['url'], $row['description']); ?>
							</div>
							<div class="latest_video_title"><?php echo $row['title']; ?></div>
						</div>
					<?php
				}
			?>
		</div>
		<?php
	} elseif(isset($_GET['type']) && ($_GET['type']=="videos_page")) {
		if(isset($_SESSION['latest_last_video_id'])) {
			$latest_last_video_id = $_SESSION['latest_last_video_id'];
		}
		$videos_query = $conn->query("SELECT v.id video_id , v.*, r.* FROM videos v, rides r WHERE r.id=v.ride_id AND v.id<$latest_last_video_id ORDER BY v.upload_date DESC LIMIT 6");
		?>
		<div class="row row_space">
			<?php
				while ($row = $videos_query->fetch_array()) {
					?>
						<div class="col-md-4 col-sm-4">
							<a target="_blank" href="<?php echo $row['url']; ?>"><img src="<?php echo UPLOAD_URL . 'uploads/' . $row['small_thumb']; ?>" class="latest_img"></a>
							<div class="latest_video_info">
								<?php socialMediaShare($row['url'], $row['description']); ?>
							</div>
							<div class="latest_video_title"><?php echo $row['title']; ?></div>
						</div>
					<?php
				}
			?>
		</div>
		<?php
	} elseif(isset($_GET['type']) && ($_GET['type']=="load_more_videos")) {
		if(isset($_SESSION['latest_last_video_id'])) {
			$last_id = $_SESSION['videos']['last_id'];
		}
		$videos_query = $conn->query("SELECT v.id video_id , v.*, r.* FROM videos v, rides r WHERE r.id=v.ride_id AND v.id<$last_id ORDER BY v.id DESC LIMIT 8");
		?>
		<div class="row row_space">
			<?php
				while ($row = $videos_query->fetch_array()) {
					?>
						<div class="col-md-3 col-sm-3">
							<a target="_blank" href="<?php echo $row['url']; ?>">
								<img src="img/uploads/<?php echo $row['small_thumb']; ?>" class="latest_img">
								<h5><?php echo $row['title']; ?></h5>
							</a>
						</div>
					<?php
				}
			?>
		</div>
		<?php
	}