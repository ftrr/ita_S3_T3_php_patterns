<?php

class Duck {

       public function quack() {
              echo "Quack \n";
       }

       public function fly() {
              echo "I'm flying \n";
       }
}

class Turkey {

       public function gobble() {
              echo "Gobble gobble \n";
       }

       public function fly() {
       echo "I'm flying a short distance \n";
       }
}


class TurkeyAdapter extends Duck {

       private $turkey;

       public function __construct(Turkey $turkey){
              $this->turkey = $turkey;
       }

       public function quack(){
              return  $this->turkey->gobble();
       }

       public function fly(){
              $i = 1;
              while($i<=5){
                     $this->turkey->fly();
                    $i++;
              }
              
     
       }

}