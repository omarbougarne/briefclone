<?php
require_once 'model/articleDAO.php';
class ControllerArticle{
    private $articleDAO;
    private $catDAO;
    private $tagDAO;
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->catDAO = new CategoryDAO();
        $this->tagDAO = new TagDAO();
    }
   

function indexArticleAction(){
 
   $categoryDAO = new CategoryDAO();
    $categories = $categoryDAO->getCategories();
    $tagDAO = new TagDAO();
    $tags = $tagDAO->getTags();
    $articles=$this->articleDAO->getArticles();

    require_once 'view/article.php';
}
//Add Later to redirect to create page!!!!!!!
function createArticleAction(){
    $articles=$this->articleDAO->getArticles();

    require_once 'view/createarticle.php';
}

function storeArticleAction(){
    $newArticle = new Article(0,
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
    $query = $_GET['article_name']; 
    $this->articleDAO->getAjax($query);
    exit();
}
}
?>
