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

}