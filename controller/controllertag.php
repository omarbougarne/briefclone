<?php
require_once 'model/tagDAO.php';
class ControllerTag{
    private $tagDAO;

    public function __construct()
    {
        $this->tagDAO = new TagDAO();
    }
function indexTagAction(){

    $tagDAO = new TagDAO();
    $tags = $tagDAO->getTags();
    require_once 'view/taglist.php';
}

function createTagAction(){
    require_once 'view/createtag.php';
}

function storeTagAction(){
    $newTag = new Tag($_POST['tag_name']);
    $tagDAO = new TagDAO();
    $tagDAO->addTag($newTag);
    header('location:index.php');
    exit();
}

function editTagAction(){
    $tag_name = $_GET['tag_name'];
    $tagDAO = new TagDAO();
    $tag = $tagDAO->getTagByName($tag_name);
    require_once 'view/edittag.php';
}

function updateTagAction(){
    $tag_name = $_GET['tag_name'];
    extract($_POST);
    $this->tagDAO->updateTag($_POST);
    var_dump($tag_name);

    header('location:index.php');
    exit();
}

function deleteTagAction(){
    $tag_name = $_GET['tag_name'];
    $tagDAO = new TagDAO();
    $tag = $tagDAO->getTagByName($tag_name);
    require_once 'view/deletetag.php';
}

function destroyTagAction(){
    $tag_name = $_GET['tag_name'];
    $tagDAO = new TagDAO();
    $tagDAO->deleteTag($tag_name);
    header('location:index.php');
    exit();
}
}
?>
