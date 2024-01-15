<?php
require_once 'model/usersDAO.php';  
class ControllerUser{

function indexAction(){
    require_once 'view/login.php';
}

// function createAction(){
//     require_once 'view/create_user.php';
// }

// function storeAction(){

//     $newUser = new User($_POST['email'], $_POST['password'], $_POST['name'], $_POST['role']);


//     $usersDAO = new UsersDAO();


//     $usersDAO->addUser($newUser);

//     header('location:index.php?action=list_users');
//     exit();
// }

// function editAction(){
//     $email = $_GET['email'];
//     $usersDAO = new UsersDAO();
//     $user = $usersDAO->getUserByEmail($email);
//     require_once 'view/edit_user.php';
// }

// function updateAction(){
//     $updatedUser = new User($_POST['email'], $_POST['password'], $_POST['name'], $_POST['role']);


//     $usersDAO = new UsersDAO();


//     $usersDAO->updateUser($updatedUser);


//     header('location:index.php?action=list_users');
//     exit();
// }

// function deleteAction(){
//     $email = $_GET['email'];
//     $usersDAO = new UsersDAO();
//     $user = $usersDAO->getUserByEmail($email);
//     require_once 'view/delete_user.php';
// }

// function destroyAction(){
//     $email = $_GET['email'];
//     $usersDAO = new UsersDAO();
//     $usersDAO->deleteUser($email);


//     header('location:index.php?action=list_users');
//     exit();
// }

// function loginAction() {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $email = $_POST['email'];
//         $passwd = $_POST['passwrd'];

//         $usersDAO = new UsersDAO();
//         $user = $usersDAO->getUserByEmail($email);

//         if ($user && password_verify($passwd, $user->getpassword())) {
//             $_SESSION['user'] = $user;
//             header('location: index.php');
//             exit();
//         } else {
//             $error = "Invalid email or password";
//             require_once 'view/login.php';
//         }
//     } else {
//         require_once 'view/login.php';
//     }
// }
// public function setpassword($passwrd) {
//     $usersDAO = new UsersDAO();
//     $passwrd = password_hash($passwrd, PASSWORD_DEFAULT);
// }
//good to filter for any user
public static function LoginFilter(){
    extract($_POST);
    $userDAO = new UsersDAO();

    $userDAO->getCheckifuserExist($email,$passwrd);
    header('location:index.php?action=article');

    }
    public static function AdminFilter() {
    if ($_SESSION['role'] !== '1') {
        header('location:index.php');
    }
    }
}
?>
