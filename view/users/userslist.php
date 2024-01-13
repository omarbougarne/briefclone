<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
<a href="index.php">Add</a>
<table>
<thead>
    <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->getemail() ?></td>
        <td><?= $user->getname() ?></td>
        <td>
            <a href="index.php?action=edit&id=<?= $user->getemail() ?>">Edit</a>
            <a href="index.php?action=delete&id=<?= $user->getemail() ?>">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php include_once './view/layout.php';?>
