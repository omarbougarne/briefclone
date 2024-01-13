<?php
require_once  'connexion.php';
require_once 'users.php';


class UsersDAO{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function getUsers(){
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $usersData = $stmt->fetchAll();
        $users = array();
        foreach ($usersData as $userData) {
            $users[] = new User(
                $userData["email"],
                $userData["passwrd"],
                $userData["name"],
                $userData["role"]
            );
        }
        return $users;
    }
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User($result['email'], $result['passwrd'], $result['name'], $result['role']);
        } else {
            return null;
        }
    }

    public function addUser($user){
        $query = "INSERT INTO users (email, passwrd, name, role) VALUES (:email, :passwrd, :name, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $user->getemail());
        $stmt->bindParam(':passwrd', $user->getpassword());
        $stmt->bindParam(':name', $user->getname());
        $stmt->bindParam(':role', $user->getrole());
        $stmt->execute();
    }

    public function updateUser($user){
        $query = "UPDATE users SET passwrd=:passwrd, name=:name, role=:role WHERE email=:email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':passwrd', $user->getpassword());
        $stmt->bindParam(':name', $user->getname());
        $stmt->bindParam(':role', $user->getrole());
        $stmt->execute();
    }

    public function deleteUser($email){
        $query = "DELETE FROM users WHERE email=:email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}
?>
