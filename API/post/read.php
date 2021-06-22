<?php

header('Access-Control-Allow_Origin: *');
header('Content-Type: application/json');

include_once "../../Config/db.php";
include_once "../../Model/Post.php";


//$cars = array("Volvo", "BMW", "Toyota");
//
//echo json_encode($cars);

$database = new db();
$connection = $database->getConnection();
$post = new Post($connection);

$result = $post->readPost();

$rowCount = $result->rowCount();

if ($rowCount > 0) {

    $post_arr = array();
    $post_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'body' => $row['body']
        );

        array_push($post_arr['data'], $post_item);

    }

    echo json_encode($post_arr);

} else {
    echo json_encode(['message' => 'No post found']);
}