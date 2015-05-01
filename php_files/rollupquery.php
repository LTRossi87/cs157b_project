<?php

include "connection.php";

$storeAttr = $_POST["store"];
$prodAttr = $_POST["product"];
$timeAttr = $_POST["time"];

global $selectString;

if(!empty($storeAttr)) {
   $selectString[] = $storeAttr;
}

if(!empty($prodAttr)) {
    $selectString[] = $prodAttr;
}

if(!empty($timeAttr)) {
    $selectString[] = $timeAttr;
}

//check if the select is empty
if(empty($selectString)) {
    //handle if none is select for all dimensions
    //handle from string   
}

foreach ($selectString as $attributes) {
    $selectString = implode(", ", $selectString);
}


$selectquery = "SELECT " . $selectString . ", sum(dollar_sales)";

$fromquery = " FROM Sales_Fact, Product, Store, Promotion, Time";

$wherequery = " WHERE Sales_Fact.product_key = Product.product_key AND
                      Sales_Fact.store_key = Store.store_key AND
                      Sales_Fact.promotion_key = Promotion.promotion_key AND
                      Sales_Fact.time_key = Time.time_key";

$groupbyquery = " GROUP BY " . $selectString;

$query = $selectquery . $fromquery . $wherequery . $groupbyquery;

$result = db_query($query);
while($row = mysqli_fetch_assoc($result)) {
    $json[] = $row;
}

echo json_encode($json);


mysqli_close();
?>
