<?php

class Tigger {

        private static $instances = [];
        
        


       protected function __construct() {
               echo "Building character...<br>" . PHP_EOL;
       }

       protected function __clone(){

       }

       public function __wakeup(){
                throw new \Exception("Cannot unserialize a singleton.");    
       }


       public static function getInstance(){
       
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];

       }


       public function roar() {
        
                echo "Grrr!" . PHP_EOL;
       
        }

       public function getCounter(){

                $roars = rand(1,10);

                for ($x=1; $x<=$roars; $x++){
                        self::roar();
                }

                echo "<br>Tigger roars ".$roars." times.";
       }



 

}


function createTiggerAndRoar(){
        $t1 = Tigger::getInstance();
        Tigger::getCounter();     

}

createTiggerAndRoar();