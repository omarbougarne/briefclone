<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
<a href="index.php?action=createarticle" class="btn btn-primary">Add</a>
<a href="index.php?action=categorylist" class="btn btn-primary">Category</a>
<a href="index.php?action=taglist" class="btn btn-primary">Tag</a>
<?php foreach ($articles as $article): ?>
    <section id="article" class="my-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="fw-bold display-4 mb-3"><?= $article->getArticleName() ?></h2>
                    <p><?= $article->getArticleMain() ?></p>
                    <a href="index.php?action=back&article_id=<?=$article->getArticleId()?>" class="btn btn-primary mt-3">Read</a>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
    <div id="#live-search-results">
        
    </div>
    <div id="aside" class="col-md-4" style="position: absolute; top: 500px;">
        <div class="card">
            <div class="card-body">
                <form class="mb-3" >
                    <div class="input-group">
                        <input id="datatable-search-input" type="text" class="form-control" placeholder="Search Articles">
                        <button  class="btn btn-primary" type="button">Search</button>
                    </div>
                </form>
                <h5 class="card-title">Categories</h5>
                <ul class="list-group">
                <?php foreach ($categories as $category): ?>
                    <li class="list-group-item"><?= $category->getCatName()?></li>
                    <?php endforeach  ?>
                </ul>
                <h5 class="card-title mt-3">Tags</h5>
                <ul class="list-group">
                <?php foreach ($tags as $tag): ?>
                    <li class="list-group-item"><?=$tag->getTagName()?></li>
                    <?php endforeach  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>