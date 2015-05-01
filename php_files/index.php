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
                    Roll-Up<input type="radio" name="op" value="rollup">
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
           
    </body>
</html>
