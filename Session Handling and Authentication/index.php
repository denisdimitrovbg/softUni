<?php

use Database\PDODatabase;
use Data\UserDTO;
spl_autoload_register();



$pdo= new PDO('mysql:host=localhost; dbname=php_web_test', 'root' ,'');

$db = new PDODatabase($pdo);
$stmt = $db->query('SELECT * FROM users');
$rs = $stmt->execute();
$allUsers = $rs->fetch(UserDTO::class);


/** @var UserDTO $user */
foreach ($allUsers as $user){
    echo $user->getUsername();
}