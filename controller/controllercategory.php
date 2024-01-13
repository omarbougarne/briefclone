<?php
require_once 'model/categoryDAO.php';
class ControllerCategory{ 
    private $catDAO;

    public function __construct()
    {
        $this->catDAO = new CategoryDAO();
    }
    
function indexCategoryAction(){
    $categoryDAO = new CategoryDAO();
    $categories = $categoryDAO->getCategories();
    require_once 'view/categorylist.php';
}

function createCategoryAction(){
    require_once 'view/createcategory.php';
}

function storeCategoryAction(){
    $newCategory = new Category($_POST['cat_id'], $_POST['cat_name'], $_POST['creation_date']);


    $categoryDAO = new CategoryDAO();


    $categoryDAO->addCategory($newCategory);


    header('location:index.php');
    exit();
}

function editCategoryAction(){
    $cat_id = $_GET['cat_id'];
    $categoryDAO = new CategoryDAO();
    $category = $categoryDAO->getCategoryById($cat_id);
    require_once 'view/editcategory.php';
}

function updateCategoryAction(){
    $cat_id = $_GET['cat_id'];
    extract($_POST);
    // $updatedCategory = new Category($cat_id,$_POST['cat_name'], $_POST['creation_date'],);


    // $categoryDAO = new CategoryDAO();


    $this->catDAO->updateCategory($_POST);
    var_dump($cat_name,$creation_date);


    header('location:index.php');
    exit();
}

function deleteCategoryAction(){
    // $cat_id = $_GET['cat_id'];
    // $categoryDAO = new CategoryDAO();
    // $category = $categoryDAO->getCategoryById($cat_id);
    $cat_id = $_GET['cat_id'];
    $cat = $this->catDAO->getCategoryById($cat_id);
    require_once 'view/deletecategory.php';
}

function destroyCategoryAction(){
    $cat_id = $_GET['id'];
    $categoryDAO = new CategoryDAO();
    $categoryDAO->deleteCategory($cat_id);
    header('location:index.php');
    exit();
}
}
?>
