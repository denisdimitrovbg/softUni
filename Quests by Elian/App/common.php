<?php
session_start();
spl_autoload_register();

use Core\Template;
use Database\PDODatabase;
use Http\UserHttpHandler;
use Repository\PhonebookRepository;
use Repository\UserRepository;
use Service\Encryption\ArgonEncryptionService;
use Service\UserService;

$template = new Template();

$dbInfo = parse_ini_file('Config/db.ini');
$pdo = new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']);

$db= new PDODatabase($pdo);
$userRepository = new UserRepository($db);
$encryptionService = new ArgonEncryptionService();
$phoneBookRepository = new PhonebookRepository($db);
$userService = new UserService($userRepository, $encryptionService, $phoneBookRepository);
$userHttpHandler = new UserHttpHandler($template );