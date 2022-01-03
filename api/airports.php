<?php

include('headers.php');
include('../db/airports-class.php');

 $db = new SQLite3('../db/store.db');
 $airports = new Airports($db);

// TODO Check 
// $_SERVER['REQUEST_METHOD']

//echo "GET Airports";

switch($_SERVER['REQUEST_METHOD']){
    case "GET":
       // Display all airports in database

       $all_airports = $airports->read();

        print_r($all_airports);
        http_response_code(200);
        echo json_encode( ["message" => "not found"] );

        break;

    case "POST":
        // Create airport in database 

        $data = json_decode(file_get_contents("php://input"));
        $airports->create($data);
        echo "method POST";
        break;

    case "PUT":
        $airports->update();
        echo "method PUT";
        break;

    case "DELETE":
        $airports->delete();
        echo "method DELETE";
        break;
    default:
        
        break;
}