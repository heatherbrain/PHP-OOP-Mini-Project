<?php 
require 'init.php';
require 'class/User.php';
require_once 'class/DB.php';
require 'class/Validate.php';
require 'class/input.php';

$user = new User();
$user->logout();

?>