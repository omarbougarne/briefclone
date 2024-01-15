<?php
ob_start();
?>
            <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
                            <form action="index.php?action=pushiha&article_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                                <div class="editor mx-auto w-10/12 flex flex-col  text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" name="article_name" spellcheck="false" placeholder="Title" type="text" value="<?php echo $title; ?>">
                                    <textarea name="article_main" class="description bg-gray-100 sec p-3 h-[20vh] border border-gray-300  outline-none" id="editor"><?php echo $editor_content; ?></textarea>
                                    <h2 class="bold">Scrollable Menu</h2>
                                <div class="btn-group">
                                    <select name="selected_action" class="btn btn-default">
                                        <?php foreach($categories as $category): ?>
                                        <option value="<?php echo $category->getCategoryById(); ?>" >
                                            <?php echo $category->getCatName(); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                    <div class="mb-3">
                                            <label for="tags" class="form-label">Tags:</label>
                                            <select class="form-control" name="tags[]" multiple>
                                                <?php foreach ($tags as $tag): ?>
                                                <option value="<?php echo $tag->getTagByName(); ?>">
                                                    <?php echo $tag->getTagByName(); ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <input type="file" class="form-control" name="image_uploaded" id="" value="<?php echo $fileName; ?>">
                                    <div class="buttons flex">
                                    <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div>
                                    <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
            <script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>