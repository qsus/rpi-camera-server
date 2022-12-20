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

foreach(scandir("videos", SCANDIR_SORT_ASCENDING) as $video) {
	if ($video == ".." OR $video == "." OR $video == "git-store") continue;
	
	/* For every video:*/ ?>
	
	<h2>
		<a href="videos/<?php echo $video; ?>"><?php echo $video ?></a>
		<sup><a href="videos/<?php echo $video; ?>" download>Stáhnout</a></sup>
	</h2>
	<video controls src="videos/<?php echo $video; ?>"></video>

<?php
	/* End for every video */
} ?>
