<?php
header("Content-Type: image/png");
$text = $_POST['conclusion'];
$im = imagecreate(200, 30);
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 255, 255, 255);
imagestring($im, 2, 5, 5,  $text, $text_color);
imagepng($im);
imagedestroy($im);
?>