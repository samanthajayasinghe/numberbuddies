<form method="post">
    Number: <input type="text" name="number"> <br>
    Buddy: <input type="text" name="buddy"> <br>
    <input type="submit" value="Check">
</form>
<?php
require 'vendor/autoload.php';

use Service\UserService;

if (isset($_REQUEST['number']) && isset($_REQUEST['buddy'])) {

    try{
        $userService = new UserService();

        $isExists = $userService->checkUserBuddy(
            $_SESSION['userId'],
            $_REQUEST['number'],
            $_REQUEST['buddy']
        );

        if ($isExists) {
            echo "Combination Exists";
        }else{
            echo "Combination Not Exists";
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
