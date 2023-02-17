<html>
    <head >
        <title>Tax simulator</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link href="./css/style.css" rel="stylesheet">

    </head>

    <body>
    
    <nav class="navi">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><h4><img src="logo.png" width=80px height=90px magin-left=70px> Tax-Collector-Simulator</h4></a>
      </div>
    </nav>
    </br></br></br></br></br></br></br>
    <div class="formStyle">
      <h1 class="text-center">Tax-Collector-Simulator</h1>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <form action="calc.php" onsubmit="return validateRadioButtons()">
            <div class="inputtt">
              <label for="salary">Salary</label>
              <input type="number" class="form-control" id="salary" placeholder="Input your monthly salary here" name="salary" required>
            </div>

            <div class="form-group">
              <label for="type">Type:</label>
              <div class="form-check">
                <input type="radio" name="type" id="bi" value="bi" required/>
                <label class="form-check-label" for="bi">Bi-Monthly</label>
              </div>
              <div class="form-check">
                <input type="radio" name="type" id="mon" value="mon" required/>
                <label class="form-check-label" for="mon">Monthly</label>
              </div>
            </div>

            <div class="form-group text-center">
</br>
              <input type="submit" value="Calculate" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
  
         <?php

            $salary;
            $type=2;
            $taxYrValue;
            $excess;
            $annualTax;
            $monthTax;

            if (isset($_GET["salary"])){
                $salary=$_GET["salary"];
                $type=$_GET['type'];

                if ($type=="bi"){
                    $salary=$salary*2;
                } 

                $taxYrValue = $salary*12;
                print("<center><h6>Annual Salary : PHP " .number_format($taxYrValue,2). " </h6></center>");


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
                print("</br><center><h6>Est. Annual Tax : PHP " .number_format($annualTax,2). "</h6></center>");

                $monthTax = $annualTax/12;
                $monthTax=round($monthTax,2);
                print("</br><center><h6>Est. Monthly Tax : PHP " .number_format($monthTax,2). " </h6></center>");
            }
            

        ?> 
        </div>
        </br></br></br></br>
        <center><h6>Disclaimer: This application is just a simulator, values may not be accurate to actual tax implementations. This may just give you an idea on how much your tax may be for the year. </h5></center>
        </br></br></br></br></br>
    </body>
</html>