<?php
namespace Model;
use\PDO;

class UsersModel
{
   //1.0 Class Attributes
   private $id;
   private $firstname;
   private $lastname;
   private $username;
   private $email;
   private $password;
   private $idRole;

   //2.0 Class setters
    public function setId($id)
    {
        if ($id > 0)
        {
          $this->id=$id;
        }
    }

    public function setFirstname($firstname)
    {
        if (is_string($firstname))
        {
          $this->firstname=$firstname;
        }
    }

    public function setLastname($lastname)
    {
        if (is_string($lastname))
        {
          $this->lastname=$lastname;
        }
    }

    public function setUsername($username)
    {
        if (is_string($username))
        {
          $this->username=$username;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email))
        {
          $this->email=$email;
        }
    }

    public function setPassword($password)
    {
        if (is_string($password))
        {
          $this->password=$password;
        }
    }

    public function setIdRole($idRole)
    {
        if ($idRole > 0)
        {
          $this->idRole=$idRole;
        }
    }

    //3.0 Getters
    public function getId()
    {
        return $this->id;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getIdRole()
    {
        return $this->idRole;
    }
}
