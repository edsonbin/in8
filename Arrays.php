<?php
$siglas = ['ES', 'MG', 'RJ', 'SP', 'MT'];
$nomes =  ['Mato Grosso', 'São Paulo', 'Rio de Janeiro', 'Minas Gerais', 'Espírito Santo'];
$tabela = [];

foreach($siglas as $uf) {
    foreach($nomes as $nome){
        if (
            ($uf == 'ES' && $nome == 'Espírito Santo')
            || ($uf == 'MG' && $nome == 'Minas Gerais')
            || ($uf == 'RJ' && $nome == 'Rio de Janeiro')
            || ($uf == 'SP' && $nome == 'São Paulo')
            || ($uf == 'MT' && $nome == 'Mato Grosso')
         ) {
            $tabela[$uf] = $nome;
        }
    }
}

foreach($tabela as $key=>$value){
    print_r("$key-$value\n");
}