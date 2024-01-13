<?php
ob_start();
?>
    <p>Realy?</p>
    
    <a href="index.php?action=destroytag&tag_name=<?= $tag->getTagName();?>">Yes</a>

    <a href="index.php?">No</a>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
