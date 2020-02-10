<?php


$input = readline();
$arr = str_split($input);
$count = strlen(count_chars($input, 3));
$number = 0;
if ($input == trim($input) && strpos($input, ' ') !== false) {
    $count += 1;
}


for ($i = 0; $i < $count; $i++) {
    $number = substr_count($input, $input[$i]);
    echo $input[$i] . ' -> ' . $number . PHP_EOL;
    $input = str_replace($input[$i], '', $input);
    $count = strlen(count_chars($input, 3));

    if (strlen($input) <= 0) {
        break;
    }
    $i -= 1;
}
