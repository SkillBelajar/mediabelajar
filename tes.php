<?php
$im = new imagick('app/files/14%20Save%20File.pdf#page=1[0]');
$im->setImageFormat('jpg');
header('Content-Type: image/jpeg');
echo $im;