<form method="post">
    Number: <input type="text" name="number">
    <input type="submit" value="Number Buddies">
</form>
<?php
require 'vendor/autoload.php';

use Service\UserService;

if (isset($_REQUEST['number'])) {

    $userService = new UserService();

    if ($userService->saveBuddyNumber($_REQUEST['number'], $_SESSION['userId'])) {
        echo "Generate Successfully";
    }
}

