<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
    <section id="article" class="my-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="fw-bold display-4 mb-3"><?= $article->getArticleName() ?></h2>
                    <p><?= $article->getArticleMain() ?></p>
                </div>
            </div>
        </div>
    </section>
    
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>