<?php

class Pessoa {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Olá, sou {$this->nome} e meu e-mail é {$this->email}.<br>";
    }
}

class Funcionario extends Pessoa {
    public $salario;
    public $matricula;

    public function __construct($nome, $email, $salario, $matricula) {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    public function trabalhar() {
        echo "O funcionário {$this->nome} (matrícula: {$this->matricula}) está trabalhando. Salário: R$ " . number_format($this->salario, 2, ',', '.') . ".<br>";
    }
}

class Programador extends Funcionario {
    public $linguagemPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $linguagemPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function programar() {
        echo "O programador {$this->nome} está programando em {$this->linguagemPrincipal}.<br>";
    }
}

class Designer extends Funcionario {
    public $ferramentaPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $ferramentaPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    public function criarLayout() {
        echo "O designer {$this->nome} está criando um layout no {$this->ferramentaPrincipal}.<br>";
    }
}

$programador = new Programador("Felipe Ramos", "felipe.ramos@empresa.com", 6500.00, "DEV-404", "PHP");

echo "Exercício 6 — Três Níveis de Classes<br><br>";
echo "Execução dos métodos no objeto Programador:<br>";
$programador->apresentar();
$programador->trabalhar();
$programador->programar();
echo "<br>";

echo "Identificação das declarações dos métodos:<br>";
echo "- Método apresentar(): declarado na classe Pessoa (Nível 1)<br>";
echo "- Método trabalhar(): declarado na classe Funcionario (Nível 2)<br>";
echo "- Método programar(): declarado na classe Programador (Nível 3)<br>";
