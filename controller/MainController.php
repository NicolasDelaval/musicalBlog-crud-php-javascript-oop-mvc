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

class MainController extends Controller
{	
	
//5.3 Home page for customers and admin
	//5.3.1 Display Home Page for customers
	function displayHomePage()
	{
		ob_start();
		require 'view/front/home.php';
		$content=ob_get_clean();
		require 'view/front/templateFront.php';
	}
	//5.3.2 Display backoffice Home Page for admin
	function displayHomeAdmin()
	{
		$this->isAdmin();
		$commentsRepository= new CommentsRepository();
		$commentsNb= $commentsRepository->getCommentsCount();
		$postsRepository= new PostsRepository();
		$postsNb= $postsRepository->getPostsCount();
		$storesRepository= new StoresRepository();
		$storesNb= $storesRepository->getStoresCount();
		$usersRepository= new UsersRepository();
		$usersNb= $usersRepository->getUsersCount();
		ob_start();
		require 'view/back/homeAdmin.php';
		$content=ob_get_clean();
		require 'view/back/templateAdmin.php';
	}
}



