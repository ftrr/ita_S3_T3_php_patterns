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

    public function doSomeBusinessLogic($car,$isHighSeason,$bigStock)
    {


        echo $this->strategy->couponGenerator($car,$isHighSeason,$bigStock); 


    }
}

interface carCouponGenerator 
{
    public function couponGenerator($car,$isHighSeason,$bigStock);
    


}

class bmwCouponGenerator implements carCouponGenerator {
    public function couponGenerator($car,$isHighSeason,$bigStock){

        $discount = 0;


        if(!$isHighSeason) {$discount += 5;}
       if($bigStock) {$discount += 7;}

       return $cupoun = "Get {$discount}% off the price of your new BMW.".'<br>';


    }
}


class mercedesCouponGenerator implements carCouponGenerator {
    public function couponGenerator($car,$isHighSeason,$bigStock){
        $discount = 0;

        if(!$isHighSeason) {$discount += 4;}
        if($bigStock) {$discount += 10;}

        return $cupoun = "Get {$discount}% off the price of your new Mercedes.".'<br>';
    }
}





$context = new Context(new bmwCouponGenerator());



$context->setStrategy(new mercedesCouponGenerator());
$context->doSomeBusinessLogic('mercedes', false, true);

$context->setStrategy(new mercedesCouponGenerator());
$context->doSomeBusinessLogic('mercedes', true, false);

$context->setStrategy(new mercedesCouponGenerator());
$context->doSomeBusinessLogic('mercedes', true, true);

$context->setStrategy(new mercedesCouponGenerator());
$context->doSomeBusinessLogic('mercedes', false, false);

$context->setStrategy(new bmwCouponGenerator());
$context->doSomeBusinessLogic('bmw', false, true);

$context->setStrategy(new bmwCouponGenerator());
$context->doSomeBusinessLogic('bmw', true, false);

$context->setStrategy(new bmwCouponGenerator());
$context->doSomeBusinessLogic('bmw', true, true);

$context->setStrategy(new bmwCouponGenerator());
$context->doSomeBusinessLogic('bmw', false, false);