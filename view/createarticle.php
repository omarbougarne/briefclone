<?php
ob_start();
?>
    
            <form action="/index.php?action=storearticle" method="post">
                    <label class="form-label mb-0">Article ID:</label>
                    <input name="article_id">
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Article Name:</label>
                    <input  class="form-control border-0"  name="article_name" required>
                    <br>
                    <label class="form-label mb-0">Creation Date:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="creation_date" required>
                    <br>
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Article main:</label>
                    <textarea  class="form-control border-0" name="article_main" required></textarea>
                    <br>
                    <input class="btn btn-warning" type="submit" value="Submit" name="add">
            </form>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>