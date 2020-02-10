<?php


$input = readline();

function isPalindrome($args)
{

    if (strlen($args) % 2 == 0) {
        for ($i = 0; $i < strlen($args) / 2; $i++) {
            $current = $args[$i];
            $last = $args[strlen($args) - 1 - $i];
            if ($current !== $last) {
                return false;
                break;
            }

        }
        return true;
    } else {
        return false;
    }

}


if (!isPalindrome($input)) {
    echo "false";
} else {
    echo "true";
}