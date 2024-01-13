<?php
class ControllerArticle{

function indexArticleAction(){
    $articleDAO = new ArticleDAO();
    $articles = $articleDAO->getArticles();
    require_once 'view/articlelist.php';
}
//Add Later to redirect to create page!!!!!!!
function createArticleAction(){
    require_once 'view/create_article.php';
}

function storeArticleAction(){
    $newArticle = new Article(null,$_POST["article_id"],
    $_POST["article_name"],
    $_POST["creation_date"],
    $_POST["image"],
    $_POST["article_main"],
    $_POST["archived"],
    $_POST["fk_cat"],
    $_POST["fk_email"]);


    $articleDAO = new ArticleDAO();


    $articleDAO->addArticle($newArticle);


    header('location:index.php?action=list_article');
    exit();
}

function editArticleAction(){
    $article_id = $_GET['article_id'];
    $articleDAO = new ArticleDAO();
    $category = $articleDAO->getArticleById($article_id);
    require_once 'view/edit_Article.php';
}

function updateArticleAction(){
    $updateArticle = new Article($_POST['article_id'], $_POST['article_name'], $_POST['creation_date'],$_POST['image'], $_POST['article_main'],$_POST['archived'], $_POST['fk_cat'],$_POST['fk_email']);


    $articleDAO = new ArticleDAO();


    $articleDAO->updateArticle($updateArticle);


    header('location:index.php?action=list_article');
    exit();
}

function deleteArticleAction(){
    $article_id = $_GET['article_id'];
    $articleDAO = new ArticleDAO();
    $article = $articleDAO->getArticleById($article_id);
    require_once 'view/delete_category.php';
}

function destroyCategoryAction(){
    $article_id = $_GET['article_id'];
    $articleDAO = new ArticleDAO();
    $articleDAO->deleteCategory($article_id);
    header('location:index.php?action=list_article');
    exit();
}
}
?>
