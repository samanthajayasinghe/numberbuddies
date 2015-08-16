<?php
require 'vendor/autoload.php';

use Service\UserService;

$userService = new UserService();

$result = $userService->getBuddyNumbers($_SESSION['userId']);

?>
<table width="100%">
    <tr>
        <th width="10%" align="left">Number</th>
        <th width="20%" align="left">Created At</th>
        <th align="left">Buddies</th>
    </tr>
    <?php foreach ($result as $row) { ?>
        <tr>
            <td><?php echo $row['number_value'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><?php echo $row['buddy_list'] ?></td>
        </tr>

    <?php } ?>

</table>
