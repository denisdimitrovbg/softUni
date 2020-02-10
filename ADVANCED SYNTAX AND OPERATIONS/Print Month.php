<?php

$mounth = ["0", "January", "February", "March", "April", "May", "June",  "July", "August", "September", "October", "November", "December"];
unset($mounth[0]);
$input = readline();
if($mounth[$input]){
    echo $mounth[$input];
}else{
    echo 'Invalid Month!';
}