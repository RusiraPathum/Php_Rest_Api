<?php


class Post
{

    private $connection;
    private $table = 'posts';

    public $postID;
    public $postTitle;
    public $postBody;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function readPost()
    {

        $query = " select * from posts ";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;

    }

    public  function createPost(){

        $query = "insert into posts (title, body) values('.$this->postTitle.', '.$this->postBody.')";

    }

    public function readeSinglePost(){

        $query = " select * from posts where id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->postID);

        $stmt->execute();

        return $stmt;

    }

}