<?php
ob_start();
?>
    
            <form action="/index.php?action=storetag" method="post">
                    <label class="form-label mb-0">Tag Name:</label>
                    <input name="tag_name">
                    <br>
                    
                    <input class="btn btn-warning" type="submit" value="Submit" name="add">
            </form>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
