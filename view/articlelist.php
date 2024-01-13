<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
<a href="index.php">Add</a>
<table>
<thead>
    <tr>
        <th>ID:</th>
        <th>Article Name:</th>
        <th>Creation Date:</th>
        <th>Image:</th>
        <th>Article:</th>
        <th>Archive:</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->getArticleId() ?></td>
        <td><?= $article->getArticleName() ?></td>
        <td><?= $article->getCreationDateArticle() ?></td>
        <td><?= $article->getImage() ?></td>
        <td><?= $article->getArticleMain() ?></td>
        <td><?= $article->getArchived() ?></td>
        <td>
            <a href="index.php?action=editarticle&article_id=<?= $article->getArticleId() ?>">Edit</a>
            <a href="index.php?action=deletearticle&article_id=<?= $article->getArticleId() ?>">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
