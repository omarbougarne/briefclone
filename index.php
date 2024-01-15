<?php
// require_once './controller/controlleruser.php';
require_once './controller/controllercategory.php';
require_once './controller/controllertag.php';
require_once './controller/controllercategory.php';
require_once './controller/controllerarticle.php';
require_once './controller/controlleruser.php';
    $controllercategory = new ControllerCategory();
    $controllertag = new ControllerTag();
    $controllerarticle = new ControllerArticle();
    $controlleruser = new ControllerUser();
    // $controlleruser = new ControllerUser();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        //categorycrud
        case 'create':
           $controllercategory-> createCategoryAction();
            break;
        case 'destroy':
           $controllercategory->destroyCategoryAction();
            break;
        case 'edit':
            $controllercategory->editCategoryAction();
            break;
        case 'store':
            $controllercategory-> storeCategoryAction();
            break;
        case 'update':
            $controllercategory->updateCategoryAction();
            break;
        case 'delete':
           $controllercategory->deleteCategoryAction();
            break;
        //tagcrud
        case 'createtag':
           $controllertag-> createTagAction();
            break;
        case 'destroytag':
           
           $controllertag->destroyTagAction();
            break;
        case 'edittag':
            $controllertag->editTagAction();
            break;
        case 'storetag':
            $controllertag-> storeTagAction();
            break;
        case 'updatetag':
            $controllertag->updateTagAction();
            break;
        case 'deletetag':
           $controllertag->deleteTagAction();
            break;
            //articlecrud
            case 'createarticle':
           $controllerarticle-> createArticleAction();
            break;
        case 'destroyarticle':
           
           $controllerarticle->destroyCategoryAction();
            break;
        case 'editarticle':
            $controllerarticle->editArticleAction();
            break;
        case 'storearticle':
            $controllerarticle-> storeArticleAction();
            break;
        case 'updatearticle':
            $controllerarticle->updateArticleAction();
            break;
        case 'deletearticle':
           $controllerarticle->deleteArticleAction();
            break;
            case 'ajax':
                $controllerarticle->functioSearch();
            break;
            case 'login':
                $controlleruser->loginAction();
            break;
    }
}else{
    
    // $controllercategory->indexCategoryAction();
    // $controllertag->indexTagAction();
    // $controllerarticle->indexArticleAction();
    $controlleruser->indexAction();
            
           
}
