<?php


session_start();
use Http\UserHttpHandler;

spl_autoload_register();



$template = new Core\Template();
$dataBinder = new \Core\DataBinder();
$dbInfo = parse_ini_file('Config/db.ini');
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$userRepository = new Repository\UserRepository($db);
$encryptionService = new \Service\Encryption\ArgonEncryptionService();
$userService = new \Service\UserService($userRepository, $encryptionService);
$userHttpHandler = new UserHttpHandler($template, $dataBinder);