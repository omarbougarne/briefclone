<?php
require_once 'model/usersDAO.php';  

function indexAction(){
    $usersDAO = new UsersDAO();
    $users = $usersDAO->getUsers();
    require_once 'view/users/userslist.php';
}

function createAction(){
    require_once 'view/create_user.php';
}

function storeAction(){

    $newUser = new User($_POST['email'], $_POST['password'], $_POST['name'], $_POST['role']);


    $usersDAO = new UsersDAO();


    $usersDAO->addUser($newUser);

    header('location:index.php?action=list_users');
    exit();
}

function editAction(){
    $email = $_GET['email'];
    $usersDAO = new UsersDAO();
    $user = $usersDAO->getUserByEmail($email);
    require_once 'view/edit_user.php';
}

function updateAction(){
    $updatedUser = new User($_POST['email'], $_POST['password'], $_POST['name'], $_POST['role']);


    $usersDAO = new UsersDAO();


    $usersDAO->updateUser($updatedUser);


    header('location:index.php?action=list_users');
    exit();
}

function deleteAction(){
    $email = $_GET['email'];
    $usersDAO = new UsersDAO();
    $user = $usersDAO->getUserByEmail($email);
    require_once 'view/delete_user.php';
}

function destroyAction(){
    $email = $_GET['email'];
    $usersDAO = new UsersDAO();
    $usersDAO->deleteUser($email);


    header('location:index.php?action=list_users');
    exit();
}
?>
