# Instruções de execução


## geral
- tenha um ambiuente com php instalado e com o executavel no path
- execute uma janela de console
- va pa ara pasta do arquivo php

## questão 1 a 4
- digite 
  - php <nome_do_arquivo.php>

## questão 5 
- digite 
  - php -S localhost:8000  ///( ou outro nomeda maquina local / outra porta)
  - execute os caminhos da api por exemplo usando curl:
    - curl --location --request GET 'http://localhost:8000/Livro.php'
    - curl --location --request GET 'http://localhost:8000/Livro.php?id=2'
    - curl --location --request POST 'http://localhost:8000/Livro.php' --form 'titulo=A Revolução do Bichos' --form 'autor=Orwell, George' --form 'edicao=2'
    - curl --location --request PUT 'http://localhost:8000/Livro.php'--header 'Content-Type: application/x-www-form-urlencoded'--data-urlencode 'id=2' --data-urlencode 'autor=Santos, edson'
    - curl --location --request DELETE 'http://localhost:8000/Livro.php' --header 'Content-Type: application/x-www-form-urlencoded' --data-urlencode 'id=2'
