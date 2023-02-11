<html>
    <head >
        <title>Tax simulator</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

    </br><center><h1>Tax Collector Simulator</h1></center> </br></br>
        <!-- First Div-->
            <div class="row">
                <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form action="calc.php">
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text">Salary</span>
                        <input type="text" class="form-control" placeholder="Input your monthly salary here" name="salary">
                        
                        </div>
                    </div>
                <div class="col-sm-4"></div>
            </div>

        <!-- Radio Buttons-->
            <center></br>
            Type: 
            </br>
            <input type="radio"name="type" value="Bi"> Bi-Monthly
            <input type="radio"name="type" value="Mon"> Monthly </br>
            </center>

        <!-- Compute button-->
            <center>
                </br><input type="submit" value="Calculate"></br>
            </form>
            </center>
        <!--Results tab-->
            </br>
            <!-- <center>
                Annual Salary : PHP XXXXX.XX </br>
                Est. Annual Tax : PHP XXXXX.XX </br>
                Est. Monthly Tax : PHP XXXXX.XX </br>
            </center> -->
         <?php
            $salary = $_GET["salary"];
            // $type =  $_POST["type"];
            $taxYrValue;
            $excess;
            $annualTax;
            $monthTax;

                // if ($type=="Bi"){
                //     $salary=$salary*.2;
                // }

                $taxYrValue = $salary*12;
                print("<center>Annual Salary :$taxYrValue. </br></center>");

                if ($taxYrValue>250000&&$taxYrValue<400000){
                    $excess=($taxYrValue-250000)*.2;
                } else if ($taxYrValue>400000&&$taxYrValue<800000){
                    $excess=(($taxYrValue-400000)*.25)+30000;
                } else if ($taxYrValue>800000&&$taxYrValue<2000000){
                    $excess=(($taxYrValue-800000)*.30)+130000;
                } else if ($taxYrValue>2000000&&$taxYrValue<8000000){
                    $excess=(($taxYrValue-2000000)*.32)+490000;
                } else if ($taxYrValue>8000000){
                    $excess=(($taxYrValue-8000000)*.35)+2410000;
                } else{
                    $excess=0;
                }

                $annualTax = $excess;
                print("</br><center>Est. Annual Tax : $annualTax. </br></center>");

                $monthTax = $annualTax/12;
                $monthTax=round($monthTax,2);
                print("</br><center>Est. Monthly Tax : $monthTax. </br></center>");

        ?> 

    </body>
</html>