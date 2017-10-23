<?php
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
		    	<a target="_self" href="whatsapp://send?text=<?php echo $url; ?> <?php echo $msg; ?>" >
		    		<i class="fa fa-whatsapp"></i>
		    	</a>
		    	<a target="_self" href="fb-messenger://share?link=<?php echo $url; ?>" >
		    		<i class="fa fa-commenting"></i>
		    	</a>
			</div>
		<?php
	}