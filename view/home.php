<?php
ob_start();
// include_once 'controller/controlleruser.php';
?>
<section id="blog" class="my-5 ">
        <div class="container py-5">
            <div class="row align-items-center ">
                <div class="col-md-6 col-lg-3">
                    <div class="mb-3">
                        <h6 class="">Our Articles</h6>
                        <h2 class=" fw-bold display-4 mb-3">Latest blogs</h2>
                        <a href="blog.html" class="btn btn-primary mb-5 mb-md-0">Read Articles</a>

                    </div>
                </div>
                <?php foreach ($articles as $article) ?>
                <div class="col-md-6 col-lg-3">
                    <div class="mb-3">
                        <a href="#"><img src="images/blog1.jpg" alt="image" class="img-fluid"></a>
                        <a href="#" class="text-decoration-none">
                            <h5 class="mb-3"><?= $article->getArticleName() ?></h5>
                        </a>
                        <p><?= $article->getArticleMain() ?></p>
                        <a href="blog-single.html" class="btn btn-primary mt-3 mb-5">Read More</a>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>