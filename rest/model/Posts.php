<?php

class PostsException extends Exception {}

class Posts 
{
	private $id;
	private $title;
	private $description;

	public function __construct($id, $title, $description)
	{
		$this->setID($id);
		$this->setTitle($title);
		$this->setDescription($description);
	}

	public function getID()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setID($id)
	{
		if (($id !== null) AND (!is_numeric($id) || $id <= 0 OR $this->id !== null))
		{
			throw new PostsException('Post ID error');
		}

		$this->id = $id;
	}

	public function setTitle($title)
	{
		if (strlen($title) < 0)
		{
			throw new PostsException('Post title error');
		}

		$this->title = $title;
	}

	public function setDescription($description)
	{
		if ($description !== null)
		{
			throw new PostsException('Post title error');
		}

		$this->description = $description;
	}

	public function returnTaskAsArray()
	{
		$post = array();
		$post['id'] = $this->getID();
		$post['title'] = $this->getTitle();
		$post['description'] = $this->getDescription();
		return $post;
	}
}