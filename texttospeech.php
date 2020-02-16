<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// include 'index.html';
// $convert=0;
if (isset($_POST['convert'])){
   	echo "convert button  has been pressed";
 	$text=$_POST['textareaValue'];
	//echo $text."<br>";
	// $text=$text; add a question mark to end the text
	echo "$text";
	if(file_exists("/var/www/html/global/themes/global/textfile.txt")){
		echo "File Present <br>";
		shell_exec('rm /var/www/html/global/themes/global/textfile.txt');
	}
	$fp = fopen('/var/www/html/global/themes/global/textfile.txt', 'w') or die("Unable to open file!");
	shell_exec('chmod 777 textfile.txt 2>&1');
	fwrite($fp, $text);
	fclose($fp);
	$file_contents_text=file_get_contents('/var/www/html/global/themes/global/textfile.txt');
	// fwrite('/var/www/html/global/themes/global/textfile.txt', $file_contents_text);
	echo "file content"."$file_contents_text"; 
	// shell_exec('chmod 777 textfile.txt 2>&1');
	$output = shell_exec('python2 tts.py textfile.txt 2>&1');

	// $output1 = shell_exec('rm textfile.txt 2>&1');
	
	$convert=1;
	session_start(); 
    $_SESSION['convert'] = 1;
    header('Location: index.php'); // go to other
	// header("header_tts.html");
	// echo '<a href="audio.mp3" style="color:red">Track 1</a>';
	exit();
}
?>
