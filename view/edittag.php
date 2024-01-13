<?php
ob_start();
?>
    <form action="index.php?action=updatetag&tag_name=<?php echo $tag->getTagName() ;?>" method="post">
                    <label class="form-label mb-0">Category Name:</label>
                    <input name="tag_name" value="<?php echo $tag->getTagName() ;?>">
                    <br>
                    
                    <button class="btn btn-warning" type="submit" value="Submit" name="add">Submit</button>
            </form>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
