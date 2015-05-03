<?php
include "connection.php";

global $query;
$storeAttr = $_POST["check_list"];
$productAttr = $_POST["check_list1"];
$timeAttr = $_POST["check_list2"];

$storeslice;
$productslice;
$timeslice;

if(!empty($storeAttr)) {
    for($i = 0; $i < sizeof($storeAttr)-1; $i++) {
        $storeslice = $storeslice . "`Store`.city = \"" . $storeAttr[$i] . "\" AND ";
    }
    $storeslice = $storeslice . "`Store`.city = \"" . $storeAttr[sizeof($storeAttr) - 1] . "\"";
}


if(!empty($productAttr)) {
    for($i = 0; $i < sizeof($productAttr)-1; $i++) {
        $productslice = $productslice . "`Product`.category = \"" . $productAttr[$i] . "\" AND ";
    }
    $productslice = $productslice . "`Product`.category = \"" . $productAttr[sizeof($productAttr) - 1] . "\"";
}

if(!empty($timeAttr)) {
    for($i = 0; $i < sizeof($timeAttr)-1; $i++) {
        $timeslice = $timeslice . "`Time`.week_number_in_year = " . $timeAttr[$i] . " AND ";
    }
    $timeslice = $timeslice . "`Time`.week_number_in_year = " . $timeAttr[sizeof($timeAttr) - 1];
}

$slice;

if(!empty($storeslice)) {
    $slice = $storeslice;
}
else if(!empty($productslice)) {
    $slice = $productslice;
}
else if(!empty($timeslice)) {
    $slice = $timeslice;
}


$query = "SELECT `Store`.city, `Product`.category, `Time`.week_number_in_year, sum(dollar_sales) 
FROM 
Grocery.`Sales_Fact`,
Grocery.`Product`,
Grocery.`Store`,
Grocery.`Promotion`,
Grocery.`Time`
WHERE
`Sales_Fact`.product_key = `Product`.product_key and
`Sales_Fact`.store_key = `Store`.store_key and
`Sales_Fact`.promotion_key = `Promotion`.promotion_key and
`Sales_Fact`.time_key = `Time`.time_key and $slice
GROUP BY
`Store`.city, `Product`.category, `Time`.week_number_in_year;";

echo $query;

$result = db_query($query);
while($row = mysqli_fetch_assoc($result)) {
    $json[] = $row;
}
echo json_encode($json);
mysqli_close();
?>