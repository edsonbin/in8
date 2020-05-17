<?php

class Classe1 {
    private $num1 = null;
    private $num2 = null;
    private $num3 = null;

    public function getNum1(){
        return $this->num1;
    }    
    public function setNum1($value){
        $this->num1 = $value;
    }    

    public function getNum2(){
        return $this->num2;
    }    
    public function setNum2($value){
        $this->num2 = $value;
    }    
    public function getNum3(){
        return $this->num3;
    }    
    public function setNum3($value){
        $this->num3 = $value;
    }    

    public function produto() {
        return $this->getNum1() * $this->getNum2() * $this->getNum3();
    }
}

//Exemplo de utiliação

$Instancia = new Classe1();
$n1 = random_int(0,1000);
$n2 = random_int(0,1000);
$n3 = random_int(0,1000);
$Instancia->setNum1($n1);
$Instancia->setNum2($n2);
$Instancia->setNum3($n3);

print_r("Produto de : $n1, $n2, $n3 = {$Instancia->produto()}");