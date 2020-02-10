<?php
$input = explode(' ', readline());
$phoneBook = [];
$phone = '';
$name = '';

while ($input[0] !== 'END') {
    if (!empty($input[1])) {
        $name = $input[1];
    }

    switch ($input[0]) {
        case 'A':
            $phone = (string)$input[2];
            $phoneBook[$name] = $phone;
            break;

        case 'S':
            if (isset($phoneBook[$name])) {
                foreach ($phoneBook as $key => $value) {
                    if (array_key_exists($name, $phoneBook)) {
                        echo $name . ' -> ' . $phoneBook[$name] . PHP_EOL;
                        break;
                    }

                }
            } else {
                echo "Contact {$name} does not exist." . PHP_EOL;
            }

            break;
    }

    $input = explode(' ', readline());
}