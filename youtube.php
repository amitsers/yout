<?php
	$contents = file_get_contents($_GET['file'].".html");
	$matches = array();
	preg_match_all('/href="\/watch\?v=[\w-]+/', $contents, $matches);
	$video_ids = array_values(array_unique($matches[0]));
?>
<br/>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Publish Date</th>
                <th>Title</th>
                <th>Tags</th>
                <th>Views</th>
                <th>Likes</th>
                <th>Dislikes</th>
                <th>Duration</th>
                <th>Description</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Publish Date</th>
                <th>Title</th>
                <th>Tags</th>
                <th>Views</th>
                <th>Likes</th>
                <th>Dislikes</th>
                <th>Duration</th>
                <th>Description</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
            </tr>
        </tbody>
    </table>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$.get( "chintamani.html", function( data ) {
			var videoUrls = jQuery.uniqueSort(data.match(/href="\/watch\?v=[\w-]+/g));
			for(var i=0; i<videoUrls.length; i++) {
				videoId = videoUrls[i].split('href="/watch?v=')[1];
				var url = "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCK3fS49EYho1Oh-t8Q4EsKzCCfw9Pf2SE&fields=items(id,snippet(title,description,tags,publishedAt,thumbnails),statistics(viewCount,likeCount,dislikeCount),contentDetails(duration))&part=snippet,statistics,contentDetails&id="+videoId;
				$.get(url, function(data, status){
					$('#dataTable > tbody:last-child').append('<tr><td>'+data.items[0].snippet.publishedAt+'</td><td><a href="https://www.youtube.com/watch?v='+data.items[0].id+'">'+data.items[0].snippet.title+'</a></td><td>'+data.items[0].snippet.tags+'</td><td>'+data.items[0].statistics.viewCount+'</td><td>'+data.items[0].statistics.likeCount+'</td><td>'+data.items[0].statistics.dislikeCount+'</td><td>'+data.items[0].contentDetails.duration+'</td><td>'+data.items[0].snippet.description+'</td></tr>');
		        });
			}
		});
	});
	</script>









<br/><br/><br/>
<!--

https://www.googleapis.com/youtube/v3/search?key=AIzaSyCK3fS49EYho1Oh-t8Q4EsKzCCfw9Pf2SE&channelId=UCZVwwcHt3o-EXY4ORHwqVBg&part=snippet,id&order=date&maxResults=20

https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCK3fS49EYho1Oh-t8Q4EsKzCCfw9Pf2SE&fields=items(snippet(title,description,tags,publishedAt))&part=snippet&id=WUdcDgg27f0


https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCK3fS49EYho1Oh-t8Q4EsKzCCfw9Pf2SE&fields=items(snippet(title),statistics(viewCount))&part=snippet,statistics&id=Iwn3hWHyA4k






https://www.googleapis.com/youtube/v3/search?key=AIzaSyCK3fS49EYho1Oh-t8Q4EsKzCCfw9Pf2SE&channelId=UCZVwwcHt3o-EXY4ORHwqVBg&part=snippet,id&order=date&maxResults=50


