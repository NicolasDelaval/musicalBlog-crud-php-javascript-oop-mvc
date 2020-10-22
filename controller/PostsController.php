<?php
namespace Controller;
use Model\PostsModel;
use Model\PostsRepository;
use Model\CommentsModel;
use Model\CommentsRepository;

class PostsController extends Controller
{
	//1.0 Create a post -PostsController methods
	//1.1 Display create post form method
	function displayCreatePostForm()
	{
		$this->isAdmin();
		ob_start();
		require 'view/back/postsCreate.php';
		$content= ob_get_clean();
		require 'view/back/templateAdmin.php';
	}

	//1.2 Create new post method
	function createPost()
	{	
		$this->isAdmin();
		$postsModel= new PostsModel();
	    $postsModel->setTitle($_POST['titlePost']);
	    $postsModel->setContent($_POST['contentPost']);
	    $postsRepository= new PostsRepository;
	    $createPost= $postsRepository->createPost($postsModel);
	    $this->redirect('index.php?action=PostsController-displayPostsList');
	}

	//2.0 Read posts -PostsController Methods
	//2.0 Display posts list in admin panel
	function displayPostsList()
	{
		$this->isAdmin();
		$postsRepository= new PostsRepository;
		$posts= $postsRepository->getAllPosts();
		ob_start();
		require 'view/back/postsReadList.php';
		$content= ob_get_clean();
		require 'view/back/templateAdmin.php';
	}
	//2.1 Display all posts in front office
	function displayAllPosts()
	{
		$postsRepository= new PostsRepository;
		$posts= $postsRepository->getAllPosts();
		ob_start();
		require'view/front/postsReadAll.php';
 		$content=ob_get_clean();
 		require'view/front/templateFront.php';
	}
	//2.2 Display one post and its related comments in front office
	function displayPost()
	{
		$idPost = ($_GET['id']);
		$postsRepository= new PostsRepository();
		$post= $postsRepository->getPost($_GET['id']);
		$commentsRepository = new CommentsRepository();
		$comments= $commentsRepository->getCommentsByPost($idPost);
		ob_start();
		require('view/front/postsRead.php');
 		$content=ob_get_clean();
 		require('view/front/templateFront.php');
	}

	//3.0 Update posts- PostsController Methods
	//3.1 Update post method
	function displayUpdatePost()
	{
		$this->isAdmin();
		$postsRepository= new PostsRepository();
		$post= $postsRepository->getPost($_GET['id']);
		ob_start();
		require('view/back/postsUpdate.php');
 		$content=ob_get_clean();
 		require('view/back/templateAdmin.php');
	}

	function updatePost()
	{
		$this->isAdmin();
		$postsModel= new PostsModel();
		$postsModel->setTitle($_POST['titlePost']);
		$postsModel->setContent($_POST['contentPost']);
		$postsModel->setId($_GET['id']);
		$postsRepository= new PostsRepository();
		$postsRepository->updatePost($postsModel);
		$this->redirect('index.php?action=PostsController-displayPostsList');
	}

	//4.0 Delete posts- PostsController Methods
	//4.1 Delete post and its linked comments method
	function deletePost()
	{
		$this->isAdmin();
		$postsRepository= new PostsRepository();
		$post= $postsRepository->getPost($_GET['id']);
		$commentsRepository = new CommentsRepository;
		$deleteAllComments= $commentsRepository->deleteAllComments($_GET['id']);
		$postsRepository->deletePost($post);
		$this->redirect('index.php?action=PostsController-displayPostsList');
	}
	
}

