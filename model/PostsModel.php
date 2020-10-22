<?php
namespace Model;
use\PDO;

class PostsModel
{
	//1.0 Class Attributes
	private $id;
	private $datePost;
    private $updateDate;
    private $titlePost;
    private $contentPost;

	//2.0 Class setters
	public function setId($id)
    {
        if ($id > 0)
        {
          $this->id= $id;
        }
    }

    public function setDate($datePost)
    {
        $this->datePost= $datePost; 
    }

    public function setUpdate($updateDate)
    {
        $this->updateDate= $updateDate;
    }

    public function setTitle($titlePost)
    {
        if (is_string($titlePost))
        {
          $this->titlePost=$titlePost;
        }
    }

    public function setContent($contentPost)
    {
        if (is_string($contentPost))
        {
          $this->contentPost=$contentPost;
        }
    }

    //3.0 Class Getters
    public function getId()
    {
    	return $this->id;
    }

    public function getDate()
    {
    	return $this->datePost;
    }

    public function getUpdate()
    {
        return $this->updateDate;
    }

    public function getTitle()
    {
        return $this->titlePost;
    }

    public function getContent()
    {
        return $this->contentPost;
    }
}