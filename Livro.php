<?php
// instruções em https://github.com/edsonbin/in8/blob/master/readme.md

$metodo=$_SERVER["REQUEST_METHOD"];

$livros = new Livro();

header('Content-Type: application/json');
$retorno = call_user_func(strtolower($metodo),$livros);
echo json_encode($retorno);

unset($livros);

function get($livros) {
    if(!empty($_GET["id"]))
    {
        $retorno = $livros->get($_GET["id"]);

        if ($retorno === false) {
            http_response_code(404);
            die("Não encontrado");
        }else{
            return $retorno;
        }
    }else{
        $registros = $livros->getList();
        return $registros;
    }
}

function post($livros) {
    return $livros->post($_POST);
}

function put($livros) {
    parse_str(file_get_contents("php://input"),$_VARS);
    $retorno = $livros->put($_VARS);
    if ($retorno === false) {
        http_response_code(404);
        return "Não encontrado";
    }else{
        return $retorno;
    }
}

function delete($livros) {
    parse_str(file_get_contents("php://input"),$_VARS);
    $retorno = $livros->delete($_VARS);
    if ($retorno === false) {
        http_response_code(404);
        return "Não encontrado";
    }else{
        return $retorno;
    }
}

Class Livro {
    // dados inciais para teste
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
        return array_search(intval($id), array_column($this->livros,'id'));
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
            if (isset($livro['autor'])) {
                $this->livros[$indice]['autor'] = $livro['autor']; 
            }
            if (isset($livro['edicao'])) {
                $this->livros[$indice]['edicao'] = $livro['edicao']; 
            }
            return $this->livros[$indice];
        }else {
            return false;
        }
    }

    public function delete($livro) {
        $indice = $this->find($livro['id']);
        if (!($indice === false)) {
            unset($this->livros[$indice]); 
            $this->livros = array_values($this->livros);
            return true;
        }else {
            return false;
        }
    }

}