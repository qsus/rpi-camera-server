<a href="/">HOME</a> <a href="/all.php">All videos</a><br>
Showing results for day <?php echo $_GET["day"]; ?>.<br>
<?php
// You can change this to SCANDIR_SORT_ASCENDING
$videos = array();
foreach(scandir("videos", SCANDIR_SORT_DESCENDING) as $video) {
	if ($video == ".." OR $video == "." OR $video == "git-store") continue;
	if (substr($video, 0, 10) != $_GET["day"]) continue;

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
?>

<style>
.video {
	display: inline-grid; /* inline-block */
}
</style>
