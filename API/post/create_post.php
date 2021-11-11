<?php

//header('Access-Control-Allow_Origin: *');
//header('Content-Type: application/json');

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

//header("Content-Type: application/json");
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: POST");
//header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization");

include_once "../../Config/db.php";
include_once "../../Model/Post.php";

$data = json_decode(file_get_contents('php://input'));

$database = new db();
$connection = $database->getConnection();
$post = new Post($connection);

$post->postTitle = $data->title;
$post->postBody = $data->body;

//$post->fileName  =  $_FILES['send_image']['name'];
//$post->tempPath  =  $_FILES['send_image']['tmp_name'];
//$post->fileSize  =  $_FILES['send_image']['size'];

if ($post->createPost()){
    echo json_encode(['msg' => '1']);
}else{
    echo json_encode(['msg' => '0']);
}
