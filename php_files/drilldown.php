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
                    <span class="section">Store: </span><br/>
                    <input type="checkbox" name="check_list[]" value="store_number">Store#<br/> 
                    <input type="checkbox" name="check_list[]" value="store_street_address">Address<br/>
                    <input type="checkbox" name="check_list[]" value="city">City<br/>
                    <input type="checkbox" name="check_list[]" value="store_county">County<br/>
                    <input type="checkbox" name="check_list[]" value="store_zip">Zip<br/>
                    <input type="checkbox" name="check_list[]" value="sales_district">District<br/>
                    <input type="checkbox" name="check_list[]" value="store_state">State<br/>
                    <input type="checkbox" name="check_list[]" value="sales_region">Region<br/>
                </div>
                <div class="col-md-4" id="product">
                    <span class="section">Product: </span><br/>
                    <input type="checkbox" name="check_list2[]" value="description">Description<br/>
                    <input type="checkbox" name="check_list2[]" value="brand">Brand<br/>
                    <input type="checkbox" name="check_list2[]" value="subcategory">Subcategory<br/>
                    <input type="checkbox" name="check_list2[]" value="category">Category<br/>
                    <input type="checkbox" name="check_list2[]" value="department">Department<br/>
                </div>
                <div class="col-md-4" id="time">
                    <span class="section">Time: </span><br/>
                    <input type="checkbox" name="check_list3[]" value="date">Date<br/>
                    <input type="checkbox" name="check_list3[]" value="day_of_week">Day Of Week<br/>
                    <input type="checkbox" name="check_list3[]" value="day_number_in_month">Day Number in Month<br/>
                    <input type="checkbox" name="check_list3[]" value="week_number_in_year">Week Number in Year<br/>
                    <input type="checkbox" name="check_list3[]" value="Month">Month<br/>
                    <input type="checkbox" name="check_list3[]" value="quarter">Quarter<br/>
                    <input type="checkbox" name="check_list3[]" value="fiscal_period">Fiscal Period<br/>
                    <input type="checkbox" name="check_list3[]" value="year">Year<br/>
                </div>
                    
                <div class="button"> 
                    <input type="Submit">
                </div>
            </form>
    </body>
</html>
