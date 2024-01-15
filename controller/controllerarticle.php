<?php
require_once 'model/articleDAO.php';
class ControllerArticle{
    private $articleDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
    }

function indexArticleAction(){
//    $articles=$this->articleDAO->getLatestArticle($article_id);
//    $article_id = $_GET['article_id'];
    require_once 'view/article.php';
}
//Add Later to redirect to create page!!!!!!!
function createArticleAction(){
    require_once 'view/createarticle.php';
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
    $this->articleDAO->addArticle($newArticle);


    header('location:index.php');
    exit();
}

function editArticleAction(){
    $article_id = $_GET['article_id'];
    $this->articleDAO->getArticleById($article_id);
    require_once 'view/edit_Article.php';
}

function updateArticleAction(){
    $updateArticle = new Article($_POST['article_id'], $_POST['article_name'], $_POST['creation_date'],$_POST['image'], $_POST['article_main'],$_POST['archived'], $_POST['fk_cat'],$_POST['fk_email']);


    


    $this->articleDAO->updateArticle($updateArticle);


    header('location:index.php?action=list_article');
    exit();
}

function deleteArticleAction(){
    $article_id = $_GET['article_id'];
    $this->articleDAO->getArticleById($article_id);
    require_once 'view/delete_category.php';
}

function destroyCategoryAction(){
    $article_id = $_GET['article_id'];
    $this->articleDAO->deleteCategory($article_id);
    header('location:index.php?action=list_article');
    exit();
}
function functioSearch(){
    $name = $_GET['article_name']; 
    $this->articleDAO->getAjax($name);
    exit();
}

}
?>
