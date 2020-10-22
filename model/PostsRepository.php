<?php
namespace Model;
use\PDO;

class PostsRepository extends ParentModel
{
	//PostsRepository methods
	//1.0 Create posts methods*/
	//1.1 Create a new post method
	public function createPost($post)
	{
		$createPost = $this->db->prepare('INSERT INTO posts (datePost, titlePost, contentPost) VALUES (NOW(), :titlePost, :contentPost)');
		$createPost->bindParam(":titlePost", $post->getTitle(), PDO::PARAM_STR );
		$createPost->bindParam(":contentPost", $post->getContent(), PDO::PARAM_STR );
		$createPost-> execute();
		return $createPost;
	}

	//2.0 Read posts methods*/
	//2.1 get all posts methods
	public function getAllPosts()
	{
		$req= $this->db->prepare('SELECT id, datePost, titlePost, contentPost FROM posts ORDER BY datePost DESC');
        $req->execute();
        $result= $req->fetchAll();
        $posts=[];
        foreach ($result as $post)
        {
        	$postsModel= new PostsModel();
        	$postsModel->setId($post['id']);
        	$postsModel->setDate($post['datePost']);
        	$postsModel->setTitle($post['titlePost']);
        	$postsModel->setContent($post['contentPost']);
        	$posts[]= $postsModel;
        }
        return $posts;
	}
	//2.2 get one specific post method
	public function getPost($id)
	{
		$req= $this->db->prepare('SELECT * FROM posts WHERE id=:id');
		$req->bindParam(":id", $id, PDO::PARAM_INT);
		$req->execute();
		$result= $req->fetch();
		$postsModel= new PostsModel();
		$postsModel->setId($result['id']);
		$postsModel->setDate($result['datePost']);
		$postsModel->setTitle($result['titlePost']);
		$postsModel->setContent($result['contentPost']);
		$post= $postsModel;
		return $post;
	}
	//2.3 Posts count method
    public function getPostsCount(){
        $req = $this->db->prepare("SELECT COUNT(id) as postsNb FROM posts");
        $req->execute();
        $postsNb= $req->fetch(); 
        return $postsNb;    
    }

	//3.0 Update posts methods
	//3.1 Update post method
	public function updatePost($post)
	{
		$updatePost= $this->db->prepare('UPDATE posts SET updateDate=NOW(), titlePost=:titlePost, contentPost=:contentPost WHERE id=:id');
		$updatePost->bindParam(":id", $post->getId(), PDO::PARAM_INT);
		$updatePost->bindParam(":titlePost", $post->getTitle(), PDO::PARAM_STR);
		$updatePost->bindParam(":contentPost", $post->getContent(), PDO::PARAM_STR);
		$updatePost->execute();
		return $updatePost;
	}

	//4.0 Delete posts methods
	//4.1 Delete post method
	public function deletePost($id)
	{
		$deletePost= $this->db->prepare('DELETE FROM posts WHERE id=:id');
		$deletePost->bindParam(":id", $id->getId(), PDO::PARAM_INT);
		$deletePost->execute();
		return $deletePost;
	}	
}

//DATE_FORMAT(datePost, \'%d/%m/%Y à %H:%i:%s\') AS date_date_fr