<?php
/*// Load .env
$envFile = fopen(".env", "r");
$envStr = fread($envFile, filesize(".env"));
fclose($envFile);
$envArr = array_filter(explode(PHP_EOL, $envStr));
foreach($envArr as $envEntry) {
	$envEntryArr = explode("=", $envEntry);
	$env[$envEntryArr[0]] = $envEntryArr[1];
}
unset($envFile, $envStr, $envArr, $envEntry, $envEntryArr);
// .env is now loaded

if ($_POST["password"] != $env["password"]) {
	header('Location: /?wrongpassword=true');
	exit("The entered password is incorrect. Please do not try again, otherwise you could guess it.");
}
// Authentication is now done by apache! */

// You can change this to SCANDIR_SORT_DESCENDING
$videos = array();
foreach(scandir("videos", SCANDIR_SORT_ASCENDING) as $video) {
	if ($video == ".." OR $video == "." OR $video == "git-store") continue;
	
	$year  = substr($video, 0, 4);
	$month = substr($video, 5, 2);
	$day   = substr($video, 8, 2);

	# Create array for current day if it doesn't exist yet
	if (!is_array($videos[$year][$month][$day]))
		$videos[$year][$month][$day] = array();
	array_push($videos[$year][$month][$day], $video);
	
	/* For every video:*/ ?>
	
	<div class="video">
		<h2>
			<a href="videos/<?php echo $video; ?>"><?php echo $video ?></a>
			<sup><a href="videos/<?php echo $video; ?>" download>Stáhnout</a></sup>
		</h2>
		<video controls src="videos/<?php echo $video; ?>"></video>
	</div>

<?php
}	/* End for every video */

// debug list videos
echo "<pre>";
print_r($videos);
echo "</pre>";
?>

<style>
.video {
	display: inline-grid; /* inline-block */
}
</style>

<!-- TODO: filter videos -->
