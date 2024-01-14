<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
<a href="index.php?action=createarticle" class="btn btn-primary">Add</a>
<?php foreach ($articles as $article): ?>
    <section id="article" class="my-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="fw-bold display-4 mb-3"><?= $article->getArticleName() ?></h2>
                    <img src="data:image/jpg;base64,<?= base64_encode($article->getImage()); ?>" class="img-fluid mb-4">
                    <p><?= $article->getArticleMain() ?></p>
                    <a href="home.html" class="btn btn-primary mt-3">Back to Articles</a>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
    <div id="#live-search-results">
    </div>
    <div id="aside" class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Articles">
                        <button id="datatable-search-input" class="btn btn-primary" type="button">Search</button>
                    </div>
                </form>

                <h5 class="card-title">Categories</h5>
                <ul class="list-group">
                    <li class="list-group-item">Category 1</li>
                    <li class="list-group-item">Category 2</li>
                </ul>
                <h5 class="card-title mt-3">Tags</h5>
                <ul class="list-group">
                    <li class="list-group-item">Tag 1</li>
                    <li class="list-group-item">Tag 2</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>