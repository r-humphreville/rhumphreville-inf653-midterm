<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once '../../config/Database.php';
include_once '../../models/Quotes.php';
include_once '../../models/Authors.php';
include_once '../../models/Categories.php';

$database = new Database();
$db = $database->connect();
$quote = new Quotes($db);
$data = json_decode(file_get_contents("php://input"));

$quote->delete();
$quote->id = $data->id;

if($quote->id !== null) {
    echo json_encode(array('id' =>  $quote->id));
} 
else {
    echo json_encode(array('message' => 'No Quotes Found'));
}
?>