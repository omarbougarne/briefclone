<?php
class User
{
    private $email;
    private $passwrd;
    private $name;
    private $role;

    public function __construct($email,
    $passwrd,
    $name,
    $role)
    {
        $this->email = $email;
        $this->passwrd =$passwrd ;
        $this->name = $name ;
        $this->role = $role;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function getpassword()
    {
        return $this->passwrd;
    }

    public function getname()
    {
        return $this->name;
    }

    public function getrole()
    {
        return $this->role;
    }
}