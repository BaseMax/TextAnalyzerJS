<?php
$data="";
function files($path=".") {
	global $data;
	$files=array_diff(scandir($path), array('.', '..'));
	// print_r($files);
	foreach($files as $file) {
		if(is_dir($file)) {
			files($file);
		}
		else if($file != "concat.php"){
			$filename=$path."\\".$file;
			print $filename."\n";
			$data.=file_get_contents($filename);
		}
	}
}
files();
file_put_contents("result.txt", $data);
// print $data;
