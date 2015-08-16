<?php
require 'vendor/autoload.php';

use Service\UserService;

$userService = new UserService();

$userService->deleteOldNumbers();
