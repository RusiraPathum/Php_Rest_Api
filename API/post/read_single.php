<?php
header('Access-Control-Allow_Origin: *');
header('Content-Type: application/json');

include_once "../../Config/db.php";
include_once "../../Model/Post.php";

$database = new db();
$connection = $database->getConnection();

//$data = json_decode(file_get_contents('php://input'));

$data = $_GET['id'];

$post = new Post($connection);

$post->postID = $data;

$result = $post->readeSinglePost();

$count = $result->rowCount();

if ($count > 0) {
    $arr_category = array();
    $arr_category['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $title = $row['title'];
        $body = $row['body'];

        $element = array(
            'id' => $id,
            'title' => $title,
            'body' => $body,
        );
        array_push($arr_category['data'], $element);
    }
    echo json_encode($arr_category);
} else {
    echo json_encode(['message' => 'No categories found']);
}