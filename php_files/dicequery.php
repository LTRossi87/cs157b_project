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
    $storeslice = "(";
    for($i = 0; $i < sizeof($storeAttr)-1; $i++) {
        $storeslice = $storeslice . "`Store`.city = \"" . $storeAttr[$i] . "\" or ";
    }
    $storeslice = $storeslice . "`Store`.city = \"" . $storeAttr[sizeof($storeAttr) - 1] . "\"";
    $storeslice = $storeslice . ")";
}


if(!empty($productAttr)) {
    $productslice = "(";
    for($i = 0; $i < sizeof($productAttr)-1; $i++) {
        $productslice = $productslice . "`Product`.category = \"" . $productAttr[$i] . "\" or ";
    }
    $productslice = $productslice . "`Product`.category = \"" . $productAttr[sizeof($productAttr) - 1] . "\"";
    $productslice = $productslice . ")";
}

if(!empty($timeAttr)) {
    $timeslice = "(";
    for($i = 0; $i < sizeof($timeAttr)-1; $i++) {
        $timeslice = $timeslice . "`Time`.week_number_in_year = " . $timeAttr[$i] . " or ";
    }
    $timeslice = $timeslice . "`Time`.week_number_in_year = " . $timeAttr[sizeof($timeAttr) - 1];
    $timeslice = $timeslice . ")";
}

$slice;

if(!empty($storeslice)) {
    $slice = $storeslice;
}

if(!empty($productslice)) {
    if(!empty($slice)) {
        $slice = $slice . " and " . $productslice;
    } else {
        $slice = $productslice;
    }
}

if(!empty($timeslice)) {
    if(!empty($slice)) {
        $slice = $slice . " and " . $timeslice;
    } else {
        $slice = $timeslice;
    }
}

if(!empty($slice)) {
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
} else {
    $query = base_cube();
}

echo $query;

$result = db_query($query);
while($row = mysqli_fetch_assoc($result)) {
    $json[] = $row;
}
echo json_encode($json);

function base_cube() {
return "SELECT `Store`.city, `Product`.category, `Time`.week_number_in_year, sum(dollar_sales) 
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
        `Sales_Fact`.time_key = `Time`.time_key
        GROUP BY
        `Store`.city, `Product`.category, `Time`.week_number_in_year;";
}
?>