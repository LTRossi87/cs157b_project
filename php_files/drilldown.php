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
    </body>
</html>
