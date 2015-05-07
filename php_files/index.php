<?php
    include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="main.css" rel="stylesheet"/>

        <title>Team 3 Star Grocery</title>
    </head>
    <body>
        <div class="jumbotron">
            <h1>Welcome to Team 3 Stars' Grocery BI</h1>
        </div>
        
        <p>Please select an operation:</p>
        <form action="redirect.php" method="post" class="form">
            <div class="row">
                <div class="col-md-3" class="op">
                    Roll-Up<input type="radio" name="op" value="rollup" checked>
                </div>
                <div class="col-md-3" class="op">
                    Drill-Down<input type="radio" name="op" value="drilldown">
                </div>
                <div class="col-md-3" class="op">
                    Slice<input type="radio" name="op" value="slice">
                </div>
                <div class="col-md-3" class="op">
                    Dice<input type="radio" name="op" value="dice">
                </div>
            </div>
            <div class="button">
                <input type="Submit">
            </div> 
        </form>   
        
        
        <div class="container-fluid">
            <div id="basecubequery">
<!--                <h5>Base Cube Query</h5>-->
                <?php
                    global $basequery;
                    $basequery = "SELECT `Store`.city, `Product`.category, `Time`.week_number_in_year, sum(dollar_sales) as total
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
                                 `Store`.city, `Product`.category, `Time`.week_number_in_year";
//                        echo $basequery;
                    ?>
            </div>
         </div>
            <div class = "col-md-5" id="basecuberesults">
                <h5>Base Cube Results</h5>
                    <?php

                      $result = db_query($basequery);
                        while($row = mysqli_fetch_assoc($result)) {
                            $json[] = $row;
                        }
                        $json = json_encode($json);

                        $data = json_decode($json);
    

                        echo "<div class='scroll'>" . 
                             "<table border=1>" . 
                                "<tbody>" . 
                                    "<tr>" .
                                        "<th>" . 
                                            "City" .
                                        "</th>" .
                                        "<th>" .
                                            "Category" .
                                        "</th>" .
                                        "<th>" .
                                            "Week Number in Year" .
                                        "</th>" .
                                        "<th>" .
                                            "Sum of Dollar Sales" .
                                        "</th>" .
                                    "</tr>";

                        foreach($data as $item) {
                            echo   "<tr>" .
                                        "<td>" .
                                            $item->city .
                                        "</td>" .
                                        "<td>" .
                                            $item->category .
                                        "</td>" .
                                        "<td>" .
                                            $item->week_number_in_year .
                                        "</td>" .
                                        "<td>" .
                                            $item->total .
                                        "</td>" .
                                    "</tr>";
                        }

                        echo "</tbody>" .
                            "</table>" .
                        "</div>";

                      mysqli_close();
                    ?>
            </div>
        </div>
           
    </body>
</html>
