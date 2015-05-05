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
        <h3>Drill Down</h3>
            <form action="drilldownquery.php" method="post" id="drillform">
                <div class="col-md-4" id="store">
                    
                    
                    <!-- make base attr active -->
                    
                    
                    <span class="section">Store: </span><br/>
                    <input type="checkbox" name="check_list[]" value="store_number">Store#<br/> 
                    <input type="checkbox" name="check_list[]" value="store_street_address">Address<br/>
                    <input type="checkbox" name="check_list[]" value="city" checked>City<br/>                    
                    <input type="checkbox" name="check_list[]" value="store_county" disabled><span id="na">County</span><br/>
                <input type="checkbox" name="check_list[]" value="store_zip" disabled ><span id="na">Zip</span><br/>
                    <input type="checkbox" name="check_list[]" value="sales_district" disabled><span id="na">District</span><br/>
                    <input type="checkbox" name="check_list[]" value="store_state" disabled><span id="na">State</span><br/>
                    <input type="checkbox" name="check_list[]" value="sales_region" disabled><span id="na">Region</span><br/>
                </div>
                <div class="col-md-4" id="product">
                    <span class="section">Product: </span><br/>
                    <input type="checkbox" name="check_list2[]" value="description">Description<br/>
                    <input type="checkbox" name="check_list2[]" value="brand">Brand<br/>
                    <input type="checkbox" name="check_list2[]" value="subcategory">Subcategory<br/>
                    <input type="checkbox" name="check_list2[]" value="category" checked>Category<br/>
                    <input type="checkbox" name="check_list2[]" value="department" disabled><span id="na">Department</span><br/>
                </div>
                <div class="col-md-4" id="time">
                    <span class="section">Time: </span><br/>
                    <input type="checkbox" name="check_list3[]" value="date">Date<br/>
                    <input type="checkbox" name="check_list3[]" value="day_of_week">Day Of Week<br/>
                    <input type="checkbox" name="check_list3[]" value="day_number_in_month">Day Number in Month<br/>
                    <input type="checkbox" name="check_list3[]" value="week_number_in_year" checked>Week Number in Year<br/>
                    <input type="checkbox" name="check_list3[]" value="Month" disabled><span id="na">Month</span><br/>
                    <input type="checkbox" name="check_list3[]" value="quarter" disabled><span id="na">Quarter</span><br/>
                    <input type="checkbox" name="check_list3[]" value="fiscal_period" disabled><span id="na">Fiscal Period</span><br/>
                    <input type="checkbox" name="check_list3[]" value="year" disabled><span id="na">Year</span><br/>
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
