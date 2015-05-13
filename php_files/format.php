<?php

function arrayTable($header, $input) {
    //print_r($header);
    //print_r($input);
    
    echo "<table border=1>";
    foreach($header as $col) {
        echo('<th>');
        echo($col);
        echo('</th>');
    }
    
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

