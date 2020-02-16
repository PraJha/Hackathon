<?php 

if(isset($_FILES['file']) and !$_FILES['file']['error']){
    $fname = "11" . ".wav";

    move_uploaded_file($_FILES['file']['tmp_name'], '/var/www/html/global/themes/global/'.$fname);

    exec("chmod 777 11.wav");
}
?>
