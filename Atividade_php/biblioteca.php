<?php

class Livro {
    private $titulo;
    private $autor;
    private $emprestado;

    public function __construct($titulo, $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->emprestado = false;
    }

    public function emprestar() {
        if (!$this->emprestado) {
            $this->emprestado = true;
            return true;
        }
        return false;
    }

    public function devolver() {
        $this->emprestado = false;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function estaEmprestado() {
        return $this->emprestado;
    }
}

$livro1 = new Livro("Dom Casmurro", "Machado de Assis");
$livro2 = new Livro("O Pequeno Príncipe", "Antoine de Saint-Exupéry");
$livro3 = new Livro("O Alquimista", "Paulo Coelho");

$livros = [$livro1, $livro2, $livro3];

$opcoes = [1, 2, 3]; // 1 = emprestar, 2 = devolver, 3 = ignorar

for ($i = 0; $i < count($livros); $i++) {
    $opcao = $opcoes[$i];
    switch ($opcao) {
        case 1:
            $livros[$i]->emprestar();
            break;
        case 2:
            $livros[$i]->devolver();
            break;
        case 3:
            // nenhuma ação
            break;
    }
}

for ($i = 0; $i < count($livros); $i++) {
    echo "Título: " . $livros[$i]->getTitulo() . "\n";
    echo "Autor: " . $livros[$i]->getAutor() . "\n";

    if ($livros[$i]->estaEmprestado()) {
        echo "Situação: Emprestado\n";
        echo "Mensagem: Este livro está atualmente emprestado. Por favor, aguarde para devolução.\n";
    } else {
        echo "Situação: Disponível\n";
        echo "Mensagem: Este livro está disponível para empréstimo.\n";
    }

    echo "------------------------\n";
}
?>
