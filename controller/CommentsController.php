<?php
namespace Controller;
use Model\CommentsModel;
use Model\CommentsRepository;
use Model\PostsComments;
use Model\PostsRespository;


class CommentsController extends Controller
{
	//1.0 Create CommentsController methods
	//1.1 Create a new comment by post
	function createComment()
	{
		$this->isLogged();
		$commentsRepository = new CommentsRepository();
	    $idPost = $_GET['id'];
	    $contentComment = htmlspecialchars($_POST['contentComment']);
	    $idUser = $_SESSION['id'];
	    $createComment = $commentsRepository->createComment($idPost, $contentComment, $idUser);
	    /*$this->redirect('index.php?action=index.php?action=PostsController-displayPost&id='. $idPost);*/
	    $this->redirect('index.php?action=PostsController-displayAllPosts');
	}

	//2.0 Read CommentsController methods
	//2.1 Display all comments in back office
	function getCommentsList()
	{
		$this->isAdmin();
		$commentsRepository= new CommentsRepository();
		$allComments= $commentsRepository->getAllComments();
		ob_start();
		require 'view/back/commentsRead.php';
		$content=ob_get_clean();
		require 'view/back/templateAdmin.php';
	}

	//3.0 Delete CommentsController methods
	//3.1 Delete one specific comments methods
	function deleteComment()
	{
		$this->isAdmin();
		$commentsRepository= new CommentsRepository();
		$deleteComment = $commentsRepository->deleteComment($_GET['id']);
		$this->redirect('index.php?action=CommentsController-getCommentsList');
	}
}
