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
        <h3>Roll Up</h3>
            <form action="rollupquery.php" method="post" id="rollform">
                <div class="col-md-4" id="store">
                    <span class="section">Store: </span><br/>
                    <input type="radio" name="store" value="store_number" disabled><span id="na">Store#</span><br/> 
                    <input type="radio" name="store" value="store_street_address" disabled><span id="na">Address</span><br/>
                    <input type="radio" name="store" value="city" checked>City<br/>
                    <input type="radio" name="store" value="store_county">County<br/>
                    <input type="radio" name="store" value="store_zip">Zip<br/>
                    <input type="radio" name="store" value="sales_district">District<br/>
                    <input type="radio" name="store" value="store_state">State<br/>
                    <input type="radio" name="store" value="sales_region">Region<br/>
                    <input type="radio" name="store" value="">None<br/>
                </div>
                <div class="col-md-4" id="product">
                    <span class="section">Product: </span><br/>
                    <input type="radio" name="product" value="description" disabled><span id="na">Description</span><br/>
                    <input type="radio" name="product" value="brand" disabled><span id="na">Brand</span><br/>
                    <input type="radio" name="product" value="subcategory" disabled><span id="na">Subcategory</span><br/>
                    <input type="radio" name="product" value="category" checked>Category<br/>
                    <input type="radio" name="product" value="department">Department<br/>
                    <input type="radio" name="product" value="">None<br/>
                </div>
                <div class="col-md-4" id="time">
                    <span class="section">Time: </span><br/>
                    <input type="radio" name="time" value="date" disabled><span id="na">Date</span><br/>
                    <input type="radio" name="time" value="day_of_week" disabled><span id="na">Day Of Week</span><br/>
                    <input type="radio" name="time" value="day_number_in_month" disabled><span id="na">Day Number in Month</span><br/>
                    <input type="radio" name="time" value="week_number_in_year" checked>Week Number in Year<br/>
                    <input type="radio" name="time" value="Month">Month<br/>
                    <input type="radio" name="time" value="quarter">Quarter<br/>
                    <input type="radio" name="time" value="fiscal_period">Fiscal Period<br/>
                    <input type="radio" name="time" value="year">Year<br/>
                    <input type="radio" name="time" value="">None<br/>
                </div>
                    
                <div class="button"> 
                    <input type="Submit">
                </div>
            </form>
        
        <div class="container-fluid">
            <div class="col-md-6" id="basecubequery">
                <h5>Base Cube Query</h5>
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
                        echo $basequery;
                    ?>
            </div>
            <div class="col-md-6" id="basecuberesults">
                <h5>Base Cube Result</h5>
                    <?php

                      $result = db_query($basequery);
                        while($row = mysqli_fetch_assoc($result)) {
                            $json[] = $row;
                        }
                        $json = json_encode($json);

                        $data = json_decode($json);
    
//                        print_r($data[1]);

//                        echo $data[1]->sum(dollar_sales);
       
                        
                        echo "<div class='scroll'>";
                        echo "<table border=1>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<th>";
                        echo "City";
                        echo "</th>";
                        echo "<th>";
                        echo "Category";
                        echo "</th>";
                        echo "<th>";
                        echo "Week Number in Year";
                        echo "</th>";
                        echo "<th>";
                        echo "Sum of Dollar Sales";
                        echo "</th>";
                        echo "</tr>";

                        foreach($data as $item) {
                            echo "<tr>";
                            echo "<td>";
                            echo $item->city;
                            echo "</td>";
                            echo "<td>";
                            echo $item->category;
                            echo "</td>";
                            echo "<td>";
                            echo $item->week_number_in_year;
                            echo "</td>";
                            echo "<td>";
                            echo $item->total;
//                            printf("%.02f", $item->sum(dollar_sales));
                            echo "</td>";
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";

                      mysqli_close();
                    ?>
            </div>
        </div>
        
    </body>
</html>
