<?php

class Pessoa {
    public $nome;
    public $idade;
    public $email;

    public function __construct($nome, $idade, $email) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Olá, meu nome é {$this->nome}, tenho {$this->idade} anos e meu e-mail é {$this->email}.<br>";
    }
}

class Aluno extends Pessoa {
    public $matricula;
    public $curso;

    public function __construct($nome, $idade, $email, $matricula, $curso) {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar() {
        echo "O aluno {$this->nome} (matrícula: {$this->matricula}) está estudando para o curso de {$this->curso}.<br>";
    }
}

class Professor extends Pessoa {
    public $especialidade;
    public $salario;

    public function __construct($nome, $idade, $email, $especialidade, $salario) {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula() {
        echo "O professor {$this->nome} está ministrando aula de {$this->especialidade}.<br>";
    }
}

$aluno1 = new Aluno("Lucas Ferreira", 20, "lucas.ferreira@faculdade.edu.br", "2024101", "Sistemas de Informação");
$aluno2 = new Aluno("Mariana Lima", 22, "mariana.lima@faculdade.edu.br", "2024102", "Engenharia de Software");
$professor = new Professor("Dr. Roberto Mendes", 45, "roberto.mendes@faculdade.edu.br", "Programação Orientada a Objetos", 7800.00);

echo "Exercício 3 — Sistema Acadêmico<br><br>";

echo "Aluno 1:<br>";
$aluno1->apresentar();
$aluno1->estudar();
echo "<br>";

echo "Aluno 2:<br>";
$aluno2->apresentar();
$aluno2->estudar();
echo "<br>";

echo "Professor:<br>";
$professor->apresentar();
$professor->ministrarAula();
echo "<br>";

echo "Explicação: O método apresentar() funciona nas subclasses Aluno e Professor porque ambas herdam de Pessoa através da palavra-chave extends, recebendo acesso a todos os métodos públicos definidos na superclasse.<br>";
