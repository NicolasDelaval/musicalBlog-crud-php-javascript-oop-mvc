<?php
namespace Controller;
use Model\UsersModel;
use Model\UsersRepository;

class UsersController extends Controller
{
	//1.0 Create a new user -UsersController methods
	//1.1 Display register form- front office feature
	function viewRegister(){
		require ('view/front/formRegister.php');
	}
	//1.2 Create new user method
	function signUp()
	{	
		$usersModel = new UsersModel();
	    $usersModel->setFirstname(htmlspecialchars($_POST['firstname']));
	    $usersModel->setLastname(htmlspecialchars($_POST['lastname']));
	    $usersModel->setUsername(htmlspecialchars($_POST['username']));
	    $usersModel->setEmail(htmlspecialchars($_POST['email']));
	    $usersModel->setPassword(htmlspecialchars($_POST['password']));
		$usersRepository = new UsersRepository;
		$existingEmail= $usersRepository->getUserByEmail($_POST['email']);
	    $existingUsername= $usersRepository->getUserByUsername($_POST['username']);
	    if ($existingEmail->getId() >0){
	    	echo 'Cet adresse email est déjà prise ! <br/> Veuillez en choisir une autre <br/> <br/> <a href=index.php?action=MainController-displayHomePage>Revenir sur la page d\'accueil</a> ';
	    }else if($existingUsername->getId() >0){
        	echo 'Ce nom d\'utilisateur est déjà pris ! <br/> Veuillez en choisir un autre <br/> <br/> <a href=index.php?action=MainController-displayHomePage>Revenir sur la page d\'accueil</a> ';
    	}else{
    		$regUser= $usersRepository->signUp($usersModel);
    		$this->redirect('index.php?action=MainController-displayHomePage');
    	}
	}

	//2.0 Read users -UsersController methods
 	//2.1 Get all users list method- back office feature
	function displayAllUsers()
	{
		$this->isAdmin();
		$usersRepository= new UsersRepository;
		$users= $usersRepository->getAllUsers();
		ob_start();
 		require('view/back/usersRead.php');
 		$content=ob_get_clean();
 		require('view/back/templateAdmin.php');
	}
	//2.2 Get one specific user

	//3.0 Update users- UsersController methods
	//3.1 Display update user form method
	function displayUpdateUser()
	{
		$this->isAdmin();
		$usersRepository= new UsersRepository();
		$user= $usersRepository->getUser($_GET['id']);
		ob_start();
 		require('view/back/usersUpdate.php');
 		$content=ob_get_clean();
 		require('view/back/templateAdmin.php');
	}
	//3.2 Update user method
	function updateUser()
	{
		$this->isAdmin();
		$usersModel= new UsersModel();
        $usersModel->setFirstname($_POST['firstname']);
        $usersModel->setLastname($_POST['lastname']);
        $usersModel->setUsername($_POST['username']);
        $usersModel->setEmail($_POST['email']);
        $usersModel->setIdRole($_POST['idRole']);
		$usersModel->setId($_GET['id']);
		$usersRepository= new UsersRepository();
		$usersRepository->updateUser($usersModel);
		$this->redirect('index.php?action=UsersController-displayAllUsers');	
	}

	//4.0 Delete users- UsersController methods
	//4.1 Delete user method- back office feature
	function deleteUser()
	{
		$this->isAdmin();
		$usersRepository= new UsersRepository();
		$user= $usersRepository->getUser($_GET['id']);
		$usersRepository->deleteUser($user);
		$this->redirect('index.php?action=UsersController-displayAllUsers');
	}

	//5.0 UsersController login methods
	//5.1 Display login form
	function viewSignIn()
	{
		require('view/front/formLogin.php');
	}
	//5.2 Login method
	function signIn()
	{
	  $usersRepository = new UsersRepository;
	  $email= htmlspecialchars($_POST['email']);
	  $password= htmlspecialchars($_POST['password']);
	  $user= $usersRepository->getUserByEmail($_POST['email']);
	  $proper_pass = password_verify($_POST['password'], $user->getPassword());
	  //Check user credentials, if they doesnt match with the ones in db, warn user. Else, start session and write cookies : user is now logged in.
	  if(!$user->getId() > 0)
      {
        echo 'Identifiants de connexion incorrects ! <br/> Veuillez réessayer  <br/> <br/> <a href=index.php?action=MainController-displayHomePage>Revenir sur la page d\'accueil</a> ';
      }else{
      	if($proper_pass){
      		$_SESSION['id']= $user->getId();
            $_SESSION['username']= $user->getUsername();
            $_SESSION['password']= $user->getPassword();
            $_SESSION['idRole']= $user->getIdRole();
            $id= $user->getId();
            $role= $user->getIdRole();
            setcookie('id', $id, time() + 1800, null, null, false, true);
            setcookie('role', $role, time() + 1800, null, null, false, true);
            if($user->getIdRole() == 1){
                $this->redirect('index.php?action=MainController-displayHomeAdmin');
            } else{
                $this->redirect('index.php?action=MainController-displayHomePage');
            }
      	}
      }
	}
	
	//6.0 SignOut method
	function signOut()
	{
		$_SESSION = array();
    	session_destroy();
    	setcookie('id', '', time() - 1800, null, null, false, true);
    	setcookie('role', '', time() - 1800, null, null, false, true);
    	$this->redirect('index.php?action=MainController-displayHomePage');
	}
}

