<form method="post">
    Number: <input type="text" name="number"> <br>
    Buddy: <input type="text" name="buddy"> <br>
    <input type="submit" value="Check">
</form>
<?php
require 'vendor/autoload.php';

use Service\UserService;

if (isset($_REQUEST['number']) && isset($_REQUEST['buddy'])) {

    $userService = new UserService();

    if ($userService->saveBuddyNumber($_REQUEST['number'], $_SESSION['userId'])) {
        echo "Generate Successfully";
    }
}
