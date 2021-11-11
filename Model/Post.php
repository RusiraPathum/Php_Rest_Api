<?php

class Post
{

    private $connection;
    private $table = 'posts';

    public $postID;
    public $postTitle;
    public $postBody;
    public $document;

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

    public function readeSinglePost(){

        $query = " select * from posts where id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->postID);

        $stmt->execute();

        return $stmt;

    }

    public  function createPost(){

        $query = 'insert into posts SET title = ?, body = ?';
//        $query = 'insert into posts SET title = ?, body = ?, file = ?';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->postTitle);
        $stmt->bindParam(2, $this->postBody);
//        $stmt->bindParam(3, $this->document);

        $stmt->execute();

        return $stmt;

    }

    public  function updatePost(){

        $query = 'update posts SET title = ?, body = ? where id = ?';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->postTitle);
        $stmt->bindParam(2, $this->postBody);
        $stmt->bindParam(3, $this->postID);

        $stmt->execute();

        return $stmt;

    }

}