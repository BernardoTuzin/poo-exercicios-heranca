<?php

class Produto {
    public $nome;
    public $preco;
    public $codigo;

    public function __construct($nome, $preco, $codigo) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto() {
        echo "Produto: {$this->nome} | Código: {$this->codigo} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }

    public function aplicarDesconto($percentual) {
        if ($percentual <= 0) {
            echo "Erro: O percentual de desconto ({$percentual}%) é inválido. O preço permanece inalterado.<br>";
            return false;
        }
        $desconto = $this->preco * ($percentual / 100);
        $this->preco -= $desconto;
        echo "Desconto de {$percentual}% aplicado com sucesso!<br>";
        return true;
    }
}

class Livro extends Produto {
    public $autor;
    public $isbn;

    public function __construct($nome, $preco, $codigo, $autor, $isbn) {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }

    public function exibirProduto() {
        echo "Livro: {$this->nome} | Autor: {$this->autor} | ISBN: {$this->isbn} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}

class Eletronico extends Produto {
    public $marca;
    public $garantiaMeses;

    public function __construct($nome, $preco, $codigo, $marca, $garantiaMeses) {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }

    public function exibirProduto() {
        echo "Eletrônico: {$this->nome} | Marca: {$this->marca} | Garantia: {$this->garantiaMeses} meses | Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}

$cenario = $_GET['cenario'] ?? 'todos';

echo "Exercício 4 — Loja Virtual<br><br>";

if ($cenario === 'valido' || $cenario === 'todos') {
    $livro = new Livro("Clean Code", 100.00, "LIV-101", "Robert C. Martin", "978-0132350884");
    $eletronico = new Eletronico("Monitor Gamer 24\"", 2000.00, "ELE-202", "Dell", 24);

    echo "Cenário Válido - Descontos de 10% e 15%:<br><br>";
    echo "Preços Antes do Desconto:<br>";
    $livro->exibirProduto();
    $eletronico->exibirProduto();

    echo "<br>Aplicando Descontos Válidos:<br>";
    $livro->aplicarDesconto(10);
    $eletronico->aplicarDesconto(15);

    echo "<br>Preços Depois do Desconto:<br>";
    $livro->exibirProduto();
    $eletronico->exibirProduto();
    echo "<br>";
}

if ($cenario === 'invalido' || $cenario === 'todos') {
    $livroTeste = new Livro("Clean Code", 100.00, "LIV-101", "Robert C. Martin", "978-0132350884");

    echo "Cenário Inválido - Teste de Desconto Negativo:<br><br>";
    echo "Preço Inicial:<br>";
    $livroTeste->exibirProduto();

    echo "<br>Tentativa de aplicar desconto negativo (-15%):<br>";
    $livroTeste->aplicarDesconto(-15);

    echo "<br>Preço após tentativa (não deve ser alterado):<br>";
    $livroTeste->exibirProduto();
}
