<?php 
//redirection page do not add any text or tags prior to header function!

$operation = $_POST["op"];

if($operation === rollup) {
    header("Location: rollup.php");
}

else if($operation === drilldown) {
    header("Location: drilldown.php");

}

else if($operation === slice) {
    header("Location: slice.php");
}

else if($operation === dice) {
    header("Location: dice.php");   
}
?>
