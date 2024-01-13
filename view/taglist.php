<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
<a href="index.php?action=createtag">Add</a>
<table>
<thead>
    <tr>
        <th>Tag Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php foreach ($tags as $tag): ?>
    <tr>
        <td><?= $tag->getTagName() ?></td>
        <td>
            <a href="index.php?action=edittag&tag_name=<?= $tag->getTagName() ?>">Edit</a>
            <a href="index.php?action=deletetag&tag_name=<?= $tag->getTagName() ?>">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
