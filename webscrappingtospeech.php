<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// include 'header_tts.html';
if (isset($_POST['convertURL'])){
   	echo "convert buttonURL  has been pressed";
 	$text=$_POST['textareaValueURL'];
	// echo $text."<br>";
	// $text=$text; add a question mark to end the text
	echo "$text";
	shell_exec('rm url.txt');
	$fp = fopen('url.txt', 'w+');
	fwrite($fp, $text);
	fclose($fp);
	shell_exec('chmod 777 url.txt');
	$output = shell_exec('python3 webscrapping.py ');
	// print($output);
	// include 'header_tts.html';
	// header("header_tts.html");
	// echo '<a href="audio.mp3" style="color:red">Track 1</a>';
	$webscrapdata = file_get_contents("webscrapout.txt");
	$webscrapdata = trim($webscrapdata);
	$webscrapdata = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $webscrapdata)));
	$webscrapdata = preg_replace("/,+/", ",", $webscrapdata);
	session_start(); 
    $_SESSION['webscrap'] = 1;
    // header('Location: index.php');
	$webscrapdata = trim($webscrapdata);
	$fp = fopen('webscrapout.txt', 'w');
	fwrite($fp, $webscrapdata);
	fclose($fp);
	$output = shell_exec('python2 tts.py webscrapout.txt');
	// echo "$webscrapdata";
	header('Location: index.php');
	// exit();
}
?>
