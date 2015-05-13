<?php
include "connection.php";
include "format.php";

$storeAttr = $_POST["store"];
$prodAttr = $_POST["product"];
$timeAttr = $_POST["time"];

global $selectString;
global $fromString;
global $fromWhere;
global $header;

if(!empty($storeAttr)) {
   $selectString[] = $storeAttr;
   $fromString[] = "Store";
   $fromWhere[] = "Sales_Fact.store_key = Store.store_key";
    
    $header[] = $storeAttr;
    
}

if(!empty($prodAttr)) {
    $selectString[] = $prodAttr;
    $fromString[] = "Product";
    $fromWhere[] = "Sales_Fact.product_key = Product.product_key";
    
    $header[] = $prodAttr;
}

if(!empty($timeAttr)) {
    $selectString[] = $timeAttr;
    $fromString[] = "Time";
    $fromWhere[] = "Sales_Fact.time_key = Time.time_key";
    
    $header[] = $timeAttr;
}

//echo $selectString . "er";

//print_r($fromWhere);

//check if the select is empty
if(empty($selectString)) {
    //handle if none is select for all dimensions
    //handle from string   
    
    //only sum from
    $selectquery = "SELECT sum(dollar_sales) as total";

    $fromquery = " FROM Sales_Fact";

    $query = $selectquery . $fromquery;

}

else {
    foreach ($selectString as $attributes) {
        $selectString = implode(", ", $selectString);
    }

    foreach ($fromString as $dimensions) {
        $fromString = implode(", ", $fromString);
    }


    $selectquery = "SELECT " . $selectString . ", sum(dollar_sales) as total";

    $fromquery = " FROM " . $fromString . ", Sales_Fact ";
        
    
    $fromTemp = "";
    for($i = 0; $i < sizeof($fromWhere) - 1; $i++) {          
        $fromTemp = $fromTemp . $fromWhere[$i] . " AND ";
        
    }
    
    
//    print_r($fromWhere);
    
    
    $fromTemp = $fromTemp . $fromWhere[sizeof($fromWhere) - 1];
    
//   echo $fromTemp;

    $wherequery = " WHERE " . $fromTemp;

    $groupbyquery = " GROUP BY " . $selectString;

    $query = $selectquery . $fromquery . $wherequery . $groupbyquery;
}

//echo $query;

$result = db_query($query);
while($row = mysqli_fetch_assoc($result)) {
    $json[] = $row;
}

//get another array for the header and call the 1 function
//if ($storeAttr )
//$header[] = $storeAttr;
//$header[] = $prodAttr;
//$header[] = $timeAttr;
$header[] = "sum(dollar_sales)";

arrayTable($header, $json);


mysqli_close();
?>
