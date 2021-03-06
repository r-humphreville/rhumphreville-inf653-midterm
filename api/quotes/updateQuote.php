<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once '../../config/Database.php';
include_once '../../models/Quotes.php';
include_once '../../models/Authors.php';
include_once '../../models/Categories.php';

$database = new Database();
$db = $database->connect();
$quote = new Quotes($db);
$data = json_decode(file_get_contents("php://input"));

$quote->id = $data->id;
$quote->id = $data->id;
$quote->quote = $data->quote;
$quote->authorId = $data->authorId;
$quote->categoryId = $data->categoryId;

if($quote->update()) {
    echo json_encode(
        array(  'id' => $quote->id,
                'quote' => $quote->quote,
                'authorId' => $quote->authorId,
                'categoryId' => $quote->categoryId    
        )
    );
} else {
    echo json_encode(array('message' => 'quote not updated'));
}
