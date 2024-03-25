<?php
    $user = UserLogin::getAccountUserWithId($pdo,$_SESSION['IDUser']);
?>

<div>
    <table class="table table-hover">
        <tr>
            <th>Tên tài khoản</th>
            <td><?= $user['Name'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $user['Email'] ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?= $user['Phone'] ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?= $user['Address'] ?></td>
        </tr>
        <tr>
            <th>Vai trò</th>
            <td><?= $user['Role'] ?></td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>Active</td>
        </tr>
    </table>
</div>