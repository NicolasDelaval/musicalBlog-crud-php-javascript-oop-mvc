<?php
namespace Controller;
use Model\CommentsModel;
use Model\CommentsRepository;
use Model\PostsModel;
use Model\PostsRepository;
use Model\StoresModel;
use Model\StoresRepository;
use Model\UsersModel;
use Model\UsersRepository;


class Controller
{
	//1.0 URL redirection method
	function redirect($url)
	{
 		header('Location: '. $url);
	}
	
	//Authentification checker method
	function isLogged()
	{
		if (!isset($_SESSION['id']))
		{
			$this->redirect('index.php?action=MainController-displayHomePage');
		}
	}

	function isAdmin()
	{
		if(!isset($_SESSION['id']))
		{
			$this->redirect('index.php?action=MainController-displayHomePage');
		}elseif($_SESSION['idRole']==2){
			$this->redirect('index.php?action=MainController-displayHomePage');
		}
	}
}