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

        //print_r($all_airports);
        http_response_code(200);
        echo json_encode( $all_airports );

        break;

    case "POST":
        // Create airport in database 
        $data = json_decode(file_get_contents("php://input"));
        if ( $airports->create($data) ) {

            $all_airports = $airports->read();
            http_response_code(200);
            echo json_encode( $all_airports );
        } else {

            http_response_code(500);
        }
        break;

    case "PUT":
        $data = json_decode(file_get_contents("php://input"));
        if($airports->update($data) ) {
            $all_airports = $airports->read();
            http_response_code(200);
            echo json_encode( $all_airports );
        } else {

            http_response_code(500);
        };
        break;

    case "DELETE":
        // Delete airport 
        $data = json_decode(file_get_contents("php://input"));
        if($airports->delete($data) ) {

            $all_airports = $airports->read();
            http_response_code(200);
            echo json_encode( $all_airports );
        } else {

            http_response_code(500);
        }
        ;

        break;
    default:
        
        break;
}