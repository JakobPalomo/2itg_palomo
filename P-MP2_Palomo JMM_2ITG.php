<?php 

    class Ramen{
        private $ingredients;
        private $plating;
        private $price;

        public function displayInfo(){

            echo $this->getIngredients()." ramen style in a ". $this->getPlating()." style of plating, which costs ". $this->getPrice()." Pesos <br>";
        }

        //getters and setters
        public function setIngredients($ingredients){
            $this->ingredients = $ingredients;
        }
        public function getIngredients(){
            return $this->ingredients;
        }
        public function setPlating($plating){
            $this->plating = $plating;
        }
        public function getPlating(){
            return $this->plating;
        }
        public function setPrice($price){
            $this->price = $price;
        }
        public function getPrice(){
            return $this->price;
        }

    }

    class Drinks extends Ramen{
        

        public function __construct(private $drink)
        {
           
        }
        public function printInfo()
        {
            
            echo $this->getIngredients()." comes with ".$this->getDrink()."<br>";
        }
       
        //overidden display info
        public function displayInfo()
        {
            echo $this->getDrink(). " is very refreshing, ";
        }
        //overloaded print info       
        public function printInfo2($with)
        {
            echo $this->getDrink(). " is served ".$with. "<br><br>";
        }

        //getter
        public function getDrink(){
            return $this->drink;
        }

    }

    //multilevel
    class DrinkStyle extends Drinks{
        private $style;

        public function setStyle($style){
            $this->style = $style;
        }
        public function getStyle()
        {
            return $this->style;
        }

    }

    //heirarchical
    class ServiceCharge extends Ramen{
        private $charge;

        public function setCharge($charge){
            $this->charge = $charge;
        }
        public function getCharge(){
            return @$this->charge;
        }
    }


    //Example 1
    $ramen1 = new Ramen();
    $ramen1->setIngredients("Butao");
    $ramen1->setPlating("Japanese");
    $ramen1->setPrice(420);
    $ramen1->displayInfo();
     
    $drink1 = new Drinks("Iced Tea");
    $drink1->setIngredients("Butao");
    $drink1->printInfo();
    $drink1->displayInfo();
    $drink1->printInfo2("with lemon");

    //Example 2
    $ramen2 = new Ramen();
    $ramen2->setIngredients("Curry");
    $ramen2->setPlating("Indian");
    $ramen2->setPrice(400);
    $ramen2->displayInfo();
     
    $drink2 = new Drinks("Coca cola");
    $drink2->setIngredients("Butao");
    $drink2->printInfo();
    $drink2->displayInfo();
    $drink2->printInfo2("in a can");

    //Example 3
    $ramen3 = new Ramen();
    $ramen3->setIngredients("Red King");
    $ramen3->setPlating("Korean");
    $ramen3->setPrice(500);
    $ramen3->displayInfo();
     
    $drink3 = new Drinks("Mogu mogu");
    $drink3->setIngredients("Red king");
    $drink3->printInfo();
    $drink3->displayInfo();
    $drink3->printInfo2("in 1 liter form");


?>