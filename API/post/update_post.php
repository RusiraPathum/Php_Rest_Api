<?php

header('Access-Control-Allow_Origin: *');
header('Content-Type: application/json');

include_once "../../Config/db.php";
include_once "../../Model/Post.php";

$data = json_decode(file_get_contents('php://input'));

$database = new db();
$connection = $database->getConnection();
$post = new Post($connection);

$post->postID = $data->id;
$post->postTitle = $data->title;
$post->postBody = $data->body;

if ($post->updatePost()){
    echo json_encode(['msg' => 'Updated']);
}else{
    echo json_encode(['msg' => '0']);
}