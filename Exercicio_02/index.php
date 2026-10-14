<?php

class Funcionario {
    public $nome;
    public $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario() {
        echo "Nome: {$this->nome} | CPF: {$this->cpf} | Salário: R$ " . number_format($this->salario, 2, ',', '.') . "<br>";
    }
}

class Gerente extends Funcionario {
    public $setor;

    public function __construct($nome, $cpf, $salario, $setor) {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao() {
        echo "O gerente {$this->nome} do setor {$this->setor} está realizando uma reunião com sua equipe.<br>";
    }
}

class Desenvolvedor extends Funcionario {
    public $linguagem;

    public function __construct($nome, $cpf, $salario, $linguagem) {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar() {
        echo "O desenvolvedor {$this->nome} está programando em {$this->linguagem}.<br>";
    }
}

$gerente = new Gerente("Carlos Silva", "123.456.789-00", 8500.00, "Tecnologia");
$dev = new Desenvolvedor("Ana Souza", "987.654.321-11", 5200.00, "PHP");

$cenario = $_GET['cenario'] ?? 'todos';

echo "Exercício 2 — Funcionários<br><br>";

if ($cenario === 'valido' || $cenario === 'todos') {
    echo "Cenário Válido - Métodos Herdados e Específicos:<br><br>";
    echo "Métodos Herdados (exibirFuncionario):<br>";
    $gerente->exibirFuncionario();
    $dev->exibirFuncionario();

    echo "<br>Métodos Específicos:<br>";
    $gerente->realizarReuniao();
    $dev->programar();
    echo "<br>";
}

if ($cenario === 'invalido' || $cenario === 'todos') {
    echo "Cenário Inválido (Item 3 - Teste da chamada programar() no Gerente):<br><br>";
    echo "Tentativa de chamada: \$gerente->programar();<br><br>";
    try {
        $gerente->programar();
    } catch (Error $e) {
        echo "Resultado obtido: " . $e->getMessage() . "<br><br>";
        echo "Explicação: O método programar() foi declarado exclusivamente na subclasse Desenvolvedor. A classe Gerente herda apenas de Funcionario e não possui o método programar() em sua hierarquia de herança, resultando em um erro fatal em tempo de execução.<br>";
    }
}
