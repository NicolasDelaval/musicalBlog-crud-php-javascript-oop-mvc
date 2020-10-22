<?php
namespace Model;
use\PDO;


class UsersRepository extends ParentModel
{
    //UsersRepository methods
    //1.0 Create user methods
    //1.1 Create a new user using register form.
 	Public function signUp($user)
 	{
 		$pwd_string= $_POST['password'];
 		$pwd_hash = password_hash($pwd_string, PASSWORD_DEFAULT); //For security purpose, hash password set by user.
        $regUser = $this->db->prepare('INSERT INTO users (firstname, lastname, username, email, password, idRole) VALUES (:firstname, :lastname, :username, :email, :password, 2)');
 		$regUser->bindParam(":firstname", $user->getFirstname(), PDO::PARAM_STR);
        $regUser->bindParam(":lastname", $user->getLastname(), PDO::PARAM_STR);
        $regUser->bindParam(":username", $user->getUsername(), PDO::PARAM_STR);
        $regUser->bindParam(":email", $user->getEmail(), PDO::PARAM_STR);
        $regUser->bindParam(":password", $pwd_hash, PDO::PARAM_STR);
        $regUser->execute();
        return $regUser;
 	}

    //2.0 Get users methods
    //2.1 Get all users method
    public function getAllUsers()
    {
        $req= $this->db->prepare('SELECT * FROM users');
        $req->execute();
        $result= $req->fetchAll();
        $users= [];
        foreach ($result as $user){
            $usersModel = new UsersModel();
            $usersModel->setId($user['id']);
            $usersModel->setFirstname($user['firstname']);
            $usersModel->setLastname($user['lastname']);
            $usersModel->setUsername($user['username']);
            $usersModel->setEmail($user['email']);
            $usersModel->setPassword($user['password']);
            $usersModel->setIdRole($user['idRole']);
            $users []= $usersModel;
        }
        return $users;
    }
    //2.2 Get one specific user by id method
    public function getUser($id)
    {
        $req= $this->db->prepare('SELECT * FROM users WHERE id=:id');
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $result= $req->fetch();
        $usersModel= new UsersModel();
        $usersModel->setId($result['id']);
        $usersModel->setFirstname($result['firstname']);
        $usersModel->setLastname($result['lastname']);
        $usersModel->setUsername($result['username']);
        $usersModel->setEmail($result['email']);
        $usersModel->setPassword($result['password']);
        $usersModel->setIdRole($result['idRole']);
        $user= $usersModel;
        return $user;
    }
    //2.3 Get one specific user by email method
    public function getUserByEmail($email)
    {
        $req= $this->db->prepare('SELECT * FROM users WHERE email=:email');
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();
        $result= $req->fetch();
        $usersModel= new UsersModel();
        $usersModel->setId($result['id']);
        $usersModel->setFirstname($result['firstname']);
        $usersModel->setLastname($result['lastname']);
        $usersModel->setUsername($result['username']);
        $usersModel->setEmail($result['email']);
        $usersModel->setPassword($result['password']);
        $usersModel->setIdRole($result['idRole']);
        $userByEmail= $usersModel;
        return $userByEmail;
    }
    //2.4 Get one specific user by email method
    public function getUserByUsername($username)
    {
        $req= $this->db->prepare('SELECT * FROM users WHERE username=:username');
        $req->bindParam(":username", $username, PDO::PARAM_STR);
        $req->execute();
        $result= $req->fetch();
        $usersModel= new UsersModel();
        $usersModel->setId($result['id']);
        $usersModel->setFirstname($result['firstname']);
        $usersModel->setLastname($result['lastname']);
        $usersModel->setUsername($result['username']);
        $usersModel->setEmail($result['email']);
        $usersModel->setPassword($result['password']);
        $usersModel->setIdRole($result['idRole']);
        $userByUsername= $usersModel;
        return $userByUsername;
    }
    //2.5 Users count method
    public function getUsersCount(){
        $req = $this->db->prepare("SELECT COUNT(id) as usersNb FROM users");
        $req->execute();
        $usersNb= $req->fetch(); 
        return $usersNb;    
    }

    //3.0 Update user methods
    //3.1 Update a specific user method
    public function updateUser($user)
    {
        $updateUser= $this->db->prepare('UPDATE users SET firstname =:firstname, lastname=:lastname, username=:username, email=:email, idRole=:idRole WHERE id=:id');
        $updateUser->bindParam(":id", $user->getId(), PDO::PARAM_INT);
        $updateUser->bindParam(":firstname", $user->getFirstname(), PDO::PARAM_STR);
        $updateUser->bindParam(":lastname", $user->getLastname(), PDO::PARAM_STR);
        $updateUser->bindParam(":username", $user->getUsername(), PDO::PARAM_STR);
        $updateUser->bindParam(":email", $user->getEmail(), PDO::PARAM_STR);
        $updateUser->bindParam(":idRole", $user->getIdRole(), PDO::PARAM_STR);
        $updateUser->execute();
        return $updateUser;
    }

    //4.0 Delete users methods
    //4.1 Delete a specific music genre
    public function deleteUser($id)
    {
        $deleteUser= $this->db->prepare('DELETE FROM users WHERE id=:id');
        $deleteUser->bindParam(":id", $id->getId(), PDO::PARAM_INT);
        $deleteUser->execute();
        return $deleteUser;
    }
 
}
