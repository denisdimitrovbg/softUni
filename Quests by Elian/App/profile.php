<?php
require_once 'common.php';

$userHttpHandler->edit($userService, $_POST);
$userHttpHandler->addPhone($userService, $_POST);
