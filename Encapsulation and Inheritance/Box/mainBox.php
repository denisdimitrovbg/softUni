<?php

require_once 'Box.php';

$length = (float)readline();
$width = (float)readline();
$height = (float)readline();


try {
    $box = new Box( $length, $width, $height);
    echo $box;
}catch (Exception $e){
    echo $e->getMessage();
}



