<?php

	require_once 'mysqli-conn.php';
	function socialMediaShare($url, $msg) {
		?>
			<div class="social-shares">
				<span>Share: </span>
		    	<a target="_blank" href="https://twitter.com/share?url=<?php echo $url; ?>&text=<?php echo $msg; ?>">
		    		<i class="fa fa-twitter"></i>
		    	</a>
		    	<a target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" >
		    		<i class="fa fa-facebook"></i>
		    	</a>
		    	<a target="_blank" href="https://plus.google.com/share?url=<?php echo $url; ?>" >
			    	<i class="fa fa-google"></i>
			    </a>
		    	<a class="show_only_in_mobile" target="_self" href="whatsapp://send?text=<?php echo $url; ?> <?php echo $msg; ?>" >
		    		<i class="fa fa-whatsapp"></i>
		    	</a>
		    	<a class="show_only_in_mobile" target="_self" href="fb-messenger://share?link=<?php echo $url; ?>" >
		    		<i class="fa fa-commenting"></i>
		    	</a>
			</div>
		<?php
	}

	function getInstagramDetails() {
		return json_decode(file_get_contents("https://api.instagram.com/v1/users/6148204364/media/recent?access_token=6148204364.803b685.5ea6be38a98c4d8eb26282a98285040b"));
		// $access_token = '6148204364.803b685.5ea6be38a98c4d8eb26282a98285040b';
		// $user_id = 6148204364;
		// echo 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent?access_token=' . $access_token;
		// $insta_data = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/users/' . $user_id . '/media/recent?access_token=' . $access_token);
		// return $insta_data;
	}

	function rudr_instagram_api_curl_connect( $api_url ){
		$connection_c = curl_init(); // initializing
		curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
		curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
		curl_setopt( $connection_c, CURLOPT_TIMEOUT, 500 );
		curl_setopt($connection_c, CURLOPT_HTTPGET, 1);
		$json_return = curl_exec( $connection_c ); // connect and get json data
		curl_close( $connection_c ); // close connection
		return json_decode( $json_return ); // decode and return
	}

	define("SITE_URL", "http://www.google.com");
	define('SITE_NAME', 'TripFootage');
	define("EMAIL", "amits.sers@gmail.com");
	define('PAGE_TITLE_SUFFIX', ' | GOOGLE');
	define('FACEBOOK', 'amitsinha559');
	define('FACEBOOK_URL', 'https://www.facebook.com/amitsinha559');
	define('INSTAGRAM', 'immrsinha');
	define('INSTAGRAM_URL', 'https://www.instagram.com/iammrsinha/');
	define('YOUTUBE', 'TripFootage');
	define('YOUTUBE_URL', 'https://www.youtube.com/channel/UCC-F98h3zNfV3j8XV8QK9Ww');
	define('GOOGLE_PLUS', 'TripFootage');
	define('GOOGLE_PLUS_URL', 'https://plus.google.com/114906571510559631506');
	define('UPLOAD_URL', 'http://localhost/yout/img/');

	function getAllRides() {
		$conn = new DBConn();
		$query = $conn->query("SELECT * FROM rides");		
		while ($row = $query->fetch_assoc()) {
			$data[] = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'start_date' => $row['start_date'],
				'end_date' => $row['end_date'],
			);
		}
		return $data;
	}

	function getCorousal() {
		$conn = new DBConn();
		$corousal_query = $conn->query("SELECT * FROM recent_gallery ORDER BY sequence ASC");
		while ($row = $corousal_query->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	function getAllAlbums() {
		$conn = new DBConn();
		$gallery_query = $conn->query("SELECT * FROM gallery g, albums a WHERE a.id=g.album_id GROUP BY a.id");
		while ($row = $gallery_query->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	function getLatestAlbums($count) {
		$conn = new DBConn();
		$count = $conn->mysqli_real_escape_string($count);
		// echo "SELECT * FROM gallery g, albums a WHERE a.id=g.album_id GROUP BY a.id ORDER BY a.id DESC LIMIT $count"; exit;
		$gallery_query = $conn->query("SELECT * FROM gallery g, albums a WHERE a.id=g.album_id GROUP BY a.id ORDER BY a.id DESC LIMIT $count");
		if($gallery_query->num_rows > 0 ) {
			while ($row = $gallery_query->fetch_assoc()) {
				$data[] = $row;
				$_SESSION['album']['last_id'] = $data[$count-1]['album_id'];
			}	
			return $data;
		}
	}

	function getAllImagesByAlbumName($album_name) {
		$conn = new DBConn();
		$album_name = $conn->mysqli_real_escape_string($album_name);
		$all_images_query = $conn->query("SELECT * FROM gallery g, albums a WHERE a.id=g.album_id AND a.name='$album_name'");
		if($all_images_query->num_rows > 0) {
			while ($row = $all_images_query->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
		return array();
	}

	function getLatestVideos($count) {
		$conn = new DBConn();
		$count = $conn->mysqli_real_escape_string($count);
		$all_latest_videos_query = $conn->query("SELECT v.id video_id, r.*, v.* FROM rides r, videos v WHERE r.id=v.ride_id ORDER BY v.id DESC LIMIT $count");
		if($all_latest_videos_query->num_rows > 0) {
			while ($row = $all_latest_videos_query->fetch_assoc()) {
				$data[] = $row;
			}
			$_SESSION['videos']['last_id'] = $data[$count-1]['video_id'];
			return $data;
		}
		return array();
	}