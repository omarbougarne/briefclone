<?php
// require_once './controller/controlleruser.php';
require_once './controller/controllercategory.php';
require_once './controller/controllertag.php';
    $controllercategory = new ControllerCategory();
    $controllertag = new ControllerTag();
    $controllerarticle = new ControllerArticle();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        //categorycrud
        // case 'create':
        //    $controllercategory-> createCategoryAction();
        //     break;
        // case 'destroy':
           
        //    $controllercategory->destroyCategoryAction();
        //     break;
        // case 'edit':
        //     $controllercategory->editCategoryAction();
        //     break;
        // case 'store':
        //     $controllercategory-> storeCategoryAction();
        //     break;
        // case 'update':
        //     $controllercategory->updateCategoryAction();
        //     break;
        // case 'delete':
        //    $controllercategory->deleteCategoryAction();
        //     break;
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
           $controllertag-> createTagAction();
            break;
        case 'destroyarticle':
           
           $controllertag->destroyTagAction();
            break;
        case 'editarticle':
            $controllertag->editTagAction();
            break;
        case 'storearticle':
            $controllertag-> storeTagAction();
            break;
        case 'updatearticle':
            $controllertag->updateTagAction();
            break;
        case 'deletearticle':
           $controllertag->deleteTagAction();
            break;
    
    }
}else{
    
    // $controllercategory->indexCategoryAction();
    // $controllertag->indexTagAction();
    $controllerarticle->indexArticleAction();
            
           
}
