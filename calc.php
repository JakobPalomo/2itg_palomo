<html>
    <head >
        <title>Tax simulator</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>

    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Tax Collector Simulator</a>
      </div>
    </nav>

    <div class="container my-5">
      <h1 class="text-center">Tax Collector Simulator</h1>

      <div class="row justify-content-center">
        <div class="col-sm-4">
          <form action="calc.php" onsubmit="return validateRadioButtons()">
            <div class="form-group">
              <label for="salary">Salary</label>
              <input type="text" class="form-control" id="salary" placeholder="Input your monthly salary here" name="salary" required>
            </div>

            <div class="form-group">
              <label for="type">Type:</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="bi" value="bi"/>
                <label class="form-check-label" for="bi">Bi-Monthly</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="mon" value="mon"/>
                <label class="form-check-label" for="mon">Monthly</label>
              </div>
            </div>

            <div class="form-group text-center">
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
                print("</br><center>Est. Annual Tax : PHP $annualTax. </br></center>");

                $monthTax = $annualTax/12;
                $monthTax=round($monthTax,2);
                print("</br><center>Est. Monthly Tax : PHP $monthTax. </br></center>");
            }
            

        ?> 

    </body>
</html>