<?php
$stmt = $dbh->prepare("
SELECT user_id, user_email FROM users WHERE FKuser_role = 1
", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$stmt->execute();

while ($users = $stmt->fetch(PDO::FETCH_OBJ)) {
    ?>
    <tr>
        <td><?= $users->user_email ?></td>
        <td>
            <button class="AddToCartBttn"
                    onclick="location.href='../../Webshop/index.php?page=admin_orders&user=<?= $users->user_id ?>'"
                    type="button">View Orders
            </button>
        </td>

    </tr>
    <?php
}


