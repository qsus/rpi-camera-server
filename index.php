<a href="/">HOME</a> <a href="/all.php">All videos</a><br>
Showing list of all days.<br>
<button id="showdays">Show individual videos</button>
<script>
document.getElementById("showdays").onclick = () => {
	while (document.getElementsByClassName("day").length) {
		document.getElementsByClassName("day")[0].className=""
	}
}
</script>
<?php
// This loop creates array of all videos
// You can change this to SCANDIR_SORT_ASCENDING
$videos = array();
foreach(scandir("videos", SCANDIR_SORT_DESCENDING) as $video) {
	if ($video == ".." OR $video == "." OR $video == "git-store") continue;
	
	$year  = substr($video, 0, 4);
	$month = substr($video, 5, 2);
	$day   = substr($video, 8, 2);

	# Create array for current day if it doesn't exist yet
	if (!is_array($videos[$year][$month][$day]))
		$videos[$year][$month][$day] = array();
	array_push($videos[$year][$month][$day], $video);
}

// debug list videos
//echo "<pre>";
//print_r($videos);
//echo "</pre>";
?>

<!-- TODO: filter videos -->
<?php
foreach($videos as $yearNumber => $year) {
	echo "<li>".$yearNumber."<ul>";
	foreach($year as $monthNumber => $month) {
		echo "<li>".$yearNumber."-".$monthNumber."<ul>";
		foreach($month as $dayNumber => $day) {
			echo "<li><a href='day.php?day=".$yearNumber."-".$monthNumber."-".$dayNumber."'>".
											 $yearNumber."-".$monthNumber."-".$dayNumber."</a>";
			echo "<ul class='day'>";
			foreach($day as $video) {
				echo "<li><a href='videos/$video' >$video</a>".
					"<sup><a href='videos/$video' download>Download</a></sup>";
				
			}
			echo "</ul>";
		}
		echo "</ul>";
	}
	echo "</ul>";
}
?>
<style>
ul {
	margin: 0;
}
.day {
	display: none;
}
</style>
