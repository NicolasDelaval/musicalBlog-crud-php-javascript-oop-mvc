<?php
namespace Model;
use\PDO;


class CommentsRepository extends ParentModel
{
    //CommentsRepository methods
    //1.0 Create comment methods
    //1.1 Create a new comment
 	public function createComment($idPost, $contentComment, $idUser)
    {
        $req = $this->db->prepare('INSERT INTO comments (dateComment, contentComment, idPost, idUser) VALUES(NOW(), :contentComment, :idPost, :idUser)');
        $req->bindParam(":contentComment", $contentComment, PDO::PARAM_STR);
        $req->bindParam(":idPost", $idPost, PDO::PARAM_INT);
        $req->bindParam(":idUser", $idUser, PDO::PARAM_STR);
        $req->execute();
        $createComment = $req;
        return $createComment;
    }

    //2.0 Read comments methods
    //2.1 Get all comments grouped by post mehod
    public function getCommentsByPost($idPost)
    {
        $req = $this->db->prepare('SELECT comments.id AS idComment, comments.dateComment, comments.contentComment, users.username AS username, comments.idUser AS idUser
                                   FROM users
                                   INNER JOIN comments ON comments.idUser = users.id
                                   WHERE comments.idPost=:idPost
                                   ORDER BY comments.dateComment DESC');
        $req->bindParam(":idPost", $idPost, PDO::PARAM_INT);
        $req->execute();
        $comments= $req->fetchAll();
        return $comments;
    }
    //2.2 Get all comments method
    public function getAllComments()
    {
        $allComments = $this->db->prepare('SELECT comments.id AS idComment, comments.contentComment AS contentComment, comments.dateComment, users.username AS username, posts.titlePost AS titlePost
                                         FROM users
                                         INNER JOIN comments ON comments.idUser = users.id
                                         INNER JOIN posts ON comments.idPost=posts.id;
                                         ORDER BY comments.dateComment DESC');
        $allComments->execute();
        return $allComments->fetchAll();
    }
    //2.3 Comments count method
    public function getCommentsCount(){
        $req = $this->db->prepare("SELECT COUNT(id) as commentsNb FROM comments");
        $req->execute();
        $commentsNb= $req->fetch(); 
        return $commentsNb;    
    }


    //3.0 Delete comments method
    //3.1 Delete one specific comment
    public function deleteComment($id){
        $req= $this->db->prepare('DELETE FROM comments WHERE id= :id');
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $deleteComment = $req;
        return $deleteComment;
    }
    //3.2 Delete all comments linked to a post when deleting it
    public function deleteAllComments($idPost){
        $req= $this->db->prepare('DELETE FROM comments WHERE idPost= :idPost');
        $req->bindParam(":idPost", $idPost, PDO::PARAM_INT);
        $req->execute();
        $deleteAllComments = $req;
        return $deleteAllComments;
    }
}
