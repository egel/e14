<?php

$file = $_GET['file'];
$width = $_GET['width'];
$height = $_GET['height'];

$image = imagecreatefromjpeg($file);
list($orig_width, $orig_height) = getimagesize($file);
$ratio = $orig_width / $orig_height;
if ($ratio < 1)
{
    $width = $height * $ratio;
}
else
{
    $height = $width / $ratio;
}
$new_image = imagecreatetruecolor($width, $height);
imagecopyresized($new_image, $image,
0, 0, 0, 0,
$width, $height,
$orig_width, $orig_height);

imagejpeg($new_image, NULL, 100);

imagedestroy($new_image);

?>
