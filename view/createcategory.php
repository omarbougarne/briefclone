<?php
ob_start();
?>
    
            <form action="/index.php?action=store" method="post">
                    <label class="form-label mb-0">Category Name:</label>
                    <input name="cat_name">
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Select Date and Time:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="creation_date" required>
                    <br>
                    <input class="btn btn-warning" type="submit" value="Submit" name="add">
            </form>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
