<?php
$soma = 0;
for ($i = 1; $i < 1000; $i++) {
    if ($i%3 == 0 || $i%5 == 0){
        $soma = $soma + $i;
    }
}
print_r($soma);