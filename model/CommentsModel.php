<?php
namespace Model;
use\PDO;

class CommentsModel
{
   //1.0 Class Attributes
   private $id;
   private $dateComment;
   private $contentComment;
   private $idPost;
   private $idUser;
  
   //2.0 Class setters
    public function setId($id)
    {
        if ($id > 0)
        {
          $this->id=$id;
        }
    }

    public function setDate($dateComment)
    {
        if (is_string($dateComment))
        {
          $this->dateComment=$dateComment;
        }
    }

    public function setContent($contentComment)
    {
        if (is_string($contentComment))
        {
          $this->contentComment=$contentComment;
        }
    }

    public function setIdPost($idPost)
    {
        if ($idPost > 0)
        {
          $this->idPost=$idPost;
        }
    }

    public function setIdUser($idUser)
    {
        if ($idUser > 0)
        {
          $this->idUser=$idUser;
        }
    }

    //3.0 Getters
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->dateComment;
    }

    public function getContent()
    {
        return $this->contentComment;
    }

    public function getIdPost()
    {
        return $this->idPost;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
}
