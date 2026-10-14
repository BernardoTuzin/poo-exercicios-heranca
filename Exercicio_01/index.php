<?php

class Veiculo {
    public $marca;
    public $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados() {
        echo "Marca: {$this->marca} | Modelo: {$this->modelo} | Ano: {$this->ano}";
    }
}

class Carro extends Veiculo {
    public $quantidadePortas;

    public function __construct($marca, $modelo, $ano, $quantidadePortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->quantidadePortas = $quantidadePortas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo " | Portas: {$this->quantidadePortas}<br>";
    }
}

class Moto extends Veiculo {
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo " | Cilindradas: {$this->cilindradas}cc<br>";
    }
}

$carro = new Carro("Toyota", "Corolla", 2022, 4);
$moto = new Moto("Honda", "CB 500", 2021, 500);

echo "Exercício 1 — Veículos<br><br>";

echo "Objeto Carro:<br>";
$carro->exibirDados();
echo "<br>";

echo "Objeto Moto:<br>";
$moto->exibirDados();

echo "<br>Atributos herdados: marca, modelo, ano<br>";
echo "Atributos específicos: quantidadePortas (Carro), cilindradas (Moto)<br>";
