<?php

function db_connect() {
    //avoid connecting more than once
    static $conn;
        
    if(!isset($conn)) {
        //load config
        $config = parse_ini_file("config.ini");
        
        $servername="52.8.28.204";
        $port = "3306";
        
        //mysqli_connect(host, username, password, dbname, port, socket);

        $conn = mysqli_connect($servername, $config['username'], $config['password'], $config['dbname'], $port);
            

        if($conn === false) {
            echo "Trouble Connecting <br/>";
            return mysqli_connect_error();
        }
        
        //echo "Connected!";
        return $conn;
    } 
}


function db_query($query) {
    $conn = db_connect();
    $result = mysqli_query($conn, $query);
    return $result;
}

function db_error() {
 $conn = db_connect();
 return mysqli_error($conn);
}

//get all the rows of data
function db_select($query) {
    $rows = array();
    $result = db_query($query);
    
    if($result === false) {
     return false;   
    }
    
    //if success then get all rows
    while ($row = mysqli_fetch_assoc($result)) {
     $rows[] = $row;   
    }
    
    return $rows;
}

?>
