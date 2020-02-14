<?php
spl_autoload_register();

$authorName = readline();
$bookName = readline();
$bookPrice = readline();
$typeBook = readline();


$book = null;
try {
    switch ($typeBook) {

        case 'Gold':
            $book = new GoldenEditionBook($authorName, $bookName, $bookPrice);
            $book->increasePrice();
            break;

        case 'STANDARD':
            $book = new Book($authorName, $bookName, $bookPrice);
            $book->getPrice();
            break;
        default:
            throw new Exception('Type is not valid!');
            break;
    }
    echo 'OK' . PHP_EOL;
    echo $book->getPrice() . PHP_EOL;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
