<?php

include "connection.php";

$storeAttr = $_POST["check_list"];
$prodAttr = $_POST["check_list2"];
$timeAttr = $_POST["check_list3"];

global $selectStringStore;
global $selectStringProd;
global $selectStringTime;
global $selectStringFull;

//if 1 dimension is not selected then that there is extra ,
if(!empty($storeAttr)) {
   $selectStringStore = $storeAttr;
}

if(!empty($prodAttr)) { 
   $selectStringProd = $prodAttr;
}

if(!empty($timeAttr)) {
   $selectStringTime = $timeAttr;   
}

foreach ($selectStringStore as $attributes) {
    $selectStringStore = implode(", ", $selectStringStore);
}

foreach($selectStringProd as $attributes) {
    $selectStringProd = implode(", ", $selectStringProd);
}

foreach ($selectStringTime as $attributes) {
    $selectStringTime = implode(", ", $selectStringTime);
}

//check if select statement will be empty
if(empty($selectStringStore) and empty($selectStringProd) and empty($selectStringTime)) {
    echo "You did not select anything!";
}

else {
$selectStringFull = array($selectStringStore, $selectStringProd, $selectStringTime);



    foreach ($selectStringFull as $attributes) {
        $selectStringFull = implode(", ", $selectStringFull);
    //    echo $selectStringFull;
    }

    //echo $selectStringFull;

    $selectquery = "SELECT " . $selectStringFull . ", sum(dollar_sales)";

    $fromquery = " FROM Sales_Fact, Product, Store, Promotion, Time";

    $wherequery = " WHERE Sales_Fact.product_key = Product.product_key AND
                          Sales_Fact.store_key = Store.store_key AND
                          Sales_Fact.promotion_key = Promotion.promotion_key AND
                          Sales_Fact.time_key = Time.time_key";

    $groupbyquery = " GROUP BY " . $selectStringFull;

    $query = $selectquery . $fromquery . $wherequery . $groupbyquery;

//    echo $query;

    $result = db_query($query);
    while($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }
    
    echo json_encode($json);


    mysqli_close();
}

?>
