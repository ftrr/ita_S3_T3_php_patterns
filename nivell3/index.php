<?php

class Context{
    private $strategy;

    public function __construct(carCouponGenerator $strategy){
        $this->strategy=$strategy;
    }

    public function setStrategy(carCouponGenerator $strategy)
    {
        $this->strategy = $strategy;
    }

    public function doSomeBusinessLogic($car): void
    {


        echo $this->strategy->couponGenerator($car); 


    }
}

interface carCouponGenerator 
{
    public function couponGenerator($car);


}

class bmwCuoponGenerator implements carCouponGenerator {
    public function couponGenerator($car){

        $discount = 0;
        $isHighSeason = false;
        $bigStock = true;

        if(!$isHighSeason) {$discount += 5;}
       if($bigStock) {$discount += 7;}

       return $cupoun = "Get {$discount}% off the price of your new BMW.".'<br>';


    }
}


class mercedesCuoponGenerator implements carCouponGenerator {
    public function couponGenerator($car){
        $discount = 0;
        $isHighSeason = false;
        $bigStock = true;

        if(!$isHighSeason) {$discount += 4;}
        if($bigStock) {$discount += 10;}

        return $cupoun = "Get {$discount}% off the price of your new Mercedes.";
    }
}





$context = new Context(new bmwCuoponGenerator());

$context->doSomeBusinessLogic('bmw');

$context->setStrategy(new mercedesCuoponGenerator());
$context->doSomeBusinessLogic('mercedes');