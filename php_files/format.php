<?php

function arrayTable($input) {
    
//    echo "testing";
    
    echo "<table border=1>";
    
    foreach($input as $row) {
      echo('<tr>');
      echo('<td>');
      echo(implode('</td><td>', $row));
      echo('</td>');
      echo('</tr>');
    }
    
    echo "</table>"; 
}

?>
