<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="main.css" rel="stylesheet"/>
        
        <title>Team 3 Star Grocery</title>
    </head>
    <body>
        <?php
            //Check if Form is submitted
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $storeAttr = $_POST["dimension_choice"];

                if(empty($storeAttr)) {
                    createForm();
                } else {
                    showAttributes($storeAttr);
                } 
            } else { 
                echo '<h3>Dice</h3>';
                createForm();
            }   
        ?>
    </body>
</html>

<?php 
    function createForm() {
        echo '<p>Please select a dimension that you want to slice on:</p>
            <form action="dice.php" method="post" class="form">
                <div class="row">
                    <div class="col-md-3" class="op">
                        Store<input type="checkbox" name="dimension_choice[]" value="Store" checked>
                    </div>
                    <div class="col-md-3" class="op">
                        Product<input type="checkbox" name="dimension_choice[]" value="Product">
                    </div>
                    <div class="col-md-3" class="op">
                        Time<input type="checkbox" name="dimension_choice[]" value="Time">
                    </div>
                </div>
                <div class="button">
                    <input type="Submit">
                </div> 
            </form>';
    }

    function showAttributes($dimension) {

    for($i = 0; $i < sizeof($dimension) - 1; $i++) {
        $selectedDim = $selectedDim . $dimension[$i] . " & ";
    }
    $selectedDim = $selectedDim . $dimension[sizeof($dimension) - 1];

    print  "<h3>Dice on $selectedDim </h3>
              <form action='dicequery.php' method='post' id='rollform'>";
            

              for($i = 0; $i < sizeof($dimension); $i++) {
                $dim = $dimension[$i];
                if($dim == 'Store') {
                    print  "
                    <span class='section'>City: </span><br/>

                    <div class='row'>
                    <div style='float: left; width: 30%; padding-left:25px'>                       
                    <input type='checkbox' name='check_list[]' value='Atlanta' checked> Atlanta<br/> 
                    <input type='checkbox' name='check_list[]' value='Boston'> Boston<br/>
                    <input type='checkbox' name='check_list[]' value='Chicago'> Chicago<br/>
                    <input type='checkbox' name='check_list[]' value='Cincinnati'> Cincinnati<br/>
                    <input type='checkbox' name='check_list[]' value='Dallas'> Dallas<br/> 
                    <input type='checkbox' name='check_list[]' value='Los Angeles'> Los Angeles<br/>
                    <input type='checkbox' name='check_list[]' value='Loisville'> Loisville<br/>
                    </div>

                    <div style='float: left; width: 33%;'>
                    <input type='checkbox' name='check_list[]' value='Miami'> Miami<br/>
                    <input type='checkbox' name='check_list[]' value='Minneapolis'> Minneapolis<br/> 
                    <input type='checkbox' name='check_list[]' value='Nashville'> Nashville<br/>
                    <input type='checkbox' name='check_list[]' value='New Orleans'> New Orleans<br/> 
                    <input type='checkbox' name='check_list[]' value='New York'> New York<br/>
                    <input type='checkbox' name='check_list[]' value='Philadelphia'> Philadelphia<br/> 
                    </div>

                    <div style='float: left; width: 33%;'>
                    <input type='checkbox' name='check_list[]' value='Phoenix'> Phoenix<br/>
                    <input type='checkbox' name='check_list[]' value='Pittsburgh'> Pittsburgh<br/> 
                    <input type='checkbox' name='check_list[]' value='San Francisco'> San Francisco<br/>
                    <input type='checkbox' name='check_list[]' value='Seattle'> Seattle<br/> 
                    <input type='checkbox' name='check_list[]' value='St. Louis'> St. Louis<br/>
                    <input type='checkbox' name='check_list[]' value='Washington'> Washington<br/> 
                    </div>

                    </div>
                    ";
                }   

                if ($dim == 'Product') {
                    //print "<br /><br />";
                    print "
                    <br />
                    <span class='section'>Category: </span><br/>
                    <div style='padding-left:10px'>
                    <input type='checkbox' name='check_list1[]' value='Food' checked> Food<br/> 
                    <input type='checkbox' name='check_list1[]' value='Drinks'> Drinks<br/>
                    <input type='checkbox' name='check_list1[]' value='Supplies'> Supplies<br/>
                    </div>
                    ";
                }  

                if ($dim == 'Time') {                                     
                    print "
                    <br/><span class='section'>Weak Number: </span><br/>
                    <div style='float: left; width: 33%; padding-left:10px;'>
                    <input type='checkbox' name='check_list2[]' value=39 checked> 39<br/>"; 
                    $j = 1;
                    for($i = 40; $i <= 53; $i++) {
                        if($j % 5 == 0) {
                            print "</div>";
                            print "<div style='float: left; width: 33%;'>";
                        }
                        print "<input type='checkbox' name='check_list2[]' value=$i> $i<br/>";
                        $j++; 
                    }
                    print "</div>";
                } 
            }
            print  "<div>
                        <br /><br />
                            <div class='button'>
                            <input type='Submit'>
                            </div>
                    </div>
                    </form>";
    }
?>