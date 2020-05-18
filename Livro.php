<?php
$metodo=$_SERVER["REQUEST_METHOD"];

$livros = new Livro();

$retorno = call_user_func(strtolower($metodo),$livros);

unset($livros);

function get($livros) {
    if(!empty($_GET["id"]))
    {
        $retorno = $livros->get($_GET["id"]);
        if ($retorno === false) {
            http_response_code(404);
            die("Não encontrado");
        }else{
            echo json_encode($retorno);
        }
    }else{
        $registros = $livros->getList();
        echo json_encode($registros);
    }
}

function post($livros) {
    $retorno = $livros->post($_POST);
    echo json_encode($retorno);
}

function put($livros) {
    $retorno = $livros->put($_POST);
    if ($retorno === false) {
        http_response_code(404);
        die("Não encontrado");
    }else{
        echo json_encode($retorno);
    }
}

function delete($livros) {
    $retorno = $livros->put($_POST);
    if ($retorno === false) {
        http_response_code(404);
        die("Não encontrado");
    }else{
        echo json_encode($retorno);
    }
}

Class Livro {
    private $livros = [
        [
            'id'=>1
            ,'titulo'=> 'Techno Vision II'
            ,'autor'=> 'Charles B. Wang'
            ,'edicao' => '1'
        ],
        [
            'id'=>2
            ,'titulo'=> 'Olhai os lírios do campo'
            ,'autor'=> 'Erico Verissimo'
            ,'edicao' => '10'
        ]
    ]; 

    public function __construct() {
        if(is_file('livros.json')){
            $this->livros = json_decode(file_get_contents('livros.json'), true);
        } 
    }

    public function __destruct() {
        file_put_contents("livros.json",json_encode($this->livros));        
    }

    private function find($id) {
        return array_search(intval($id, array_column($this->livros,'id')));
    }

    public function get($id) {
        $indice = $this->find($id);
        if (!($indice === false)) {
            return $this->livros[$indice];
        }else {
            return $indice;
        }
    }

    public function getList(){
        return $this->livros;
    }

    public function post($livro) {
        $livro['id'] = count($this->livros) + 1;
        $this->livros[] = $livro;
        return $livro['id'];
    }

    public function put($livro) {
        $indice = $this->find($livro['id']);
        if (!($indice === false)) {
            if (isset($livro['titulo'])) {
                $this->livros['titulo'] = $livro['titulo']; 
            }
            if (isset($livro['titulo'])) {
                $this->livros['autor'] = $livro['autor']; 
            }
            if (isset($livro['titulo'])) {
                $this->livros['edicao'] = $livro['edicao']; 
            }
            return $this->livros[$indice];
        }else {
            return $false;
        }
    }

    public function delete($id) {
        $indice = $this->find($id);
        if (!($indice === false)) {
            unset($this->livros[$indice]);
            return true;
        }else {
            return $false;
        }
    }

}