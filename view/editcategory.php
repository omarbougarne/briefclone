<?php
ob_start();
?>
    <form action="index.php?action=update&cat_id=<?php echo $category->getCatId() ;?>" method="post">
                    <label class="form-label mb-0">Category Name:</label>
                    <input name="cat_name" value="<?php echo $category->getCatName() ;?>">
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Select Date and Time:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="creation_date" value="<?php echo $category->getCreationDate() ;?>" required>
                    <br>
                    <button class="btn btn-warning" type="submit" value="Submit" name="add">Submit</button>
            </form>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>
