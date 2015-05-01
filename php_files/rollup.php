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
                    <input type="radio" name="store" value="city">City<br/>
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
                    <input type="radio" name="product" value="category">Category<br/>
                    <input type="radio" name="product" value="department">Department<br/>
                    <input type="radio" name="product" value="">None<br/>
                </div>
                <div class="col-md-4" id="time">
                    <span class="section">Time: </span><br/>
                    <input type="radio" name="time" value="date" disabled><span id="na">Date</span><br/>
                    <input type="radio" name="time" value="day_of_week" disabled><span id="na">Day Of Week</span><br/>
                    <input type="radio" name="time" value="day_number_in_month" disabled><span id="na">Day Number in Month</span><br/>
                    <input type="radio" name="time" value="week_number_in_year">Week Number in Year<br/>
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
        
        
            <!-- AJAX -->
<!--
        <button type="button" onclick="loadXMLDoc()">
                Submit
        </button>
-->
    </body>
</html>
