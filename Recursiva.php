<?php
print_r(MMC_2_3_10(1));

// é claro que este algoritimo só seve pq os numeros não fixos 2, 3 e 10 e pequenos. 
// Se os números fossem arbritários, seria nescessário um algoritio menos ingênuo  
function MMC_2_3_10($divisor){
    if ($divisor%2 === 0 && $divisor%3 === 0 && $divisor%10 === 0){
        return $divisor;

    } else {
        return MMC_2_3_10($divisor+1);
    }
}