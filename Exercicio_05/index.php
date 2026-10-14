<?php

class ContaBancaria {
    public $titular;
    public $saldo;

    public function __construct($titular, $saldo = 0) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
            echo "Depósito de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.<br>";
        } else {
            echo "Valor de depósito inválido.<br>";
        }
    }

    public function sacar($valor) {
        if ($valor > $this->saldo) {
            echo "Operação recusada: Saldo insuficiente para o saque de R$ " . number_format($valor, 2, ',', '.') . ".<br>";
            return false;
        } elseif ($valor <= 0) {
            echo "Valor de saque inválido.<br>";
            return false;
        } else {
            $this->saldo -= $valor;
            echo "Saque de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.<br>";
            return true;
        }
    }

    public function consultarSaldo() {
        echo "Titular: {$this->titular} | Saldo: R$ " . number_format($this->saldo, 2, ',', '.') . "<br>";
    }
}

class ContaCorrente extends ContaBancaria {
    public $limite;

    public function __construct($titular, $saldo, $limite) {
        parent::__construct($titular, $saldo);
        $this->limite = $limite;
    }

    public function usarLimite($valor) {
        if ($valor <= $this->limite) {
            $this->limite -= $valor;
            $this->saldo += $valor;
            echo "Limite de R$ " . number_format($valor, 2, ',', '.') . " utilizado.<br>";
        } else {
            echo "Limite insuficiente.<br>";
        }
    }
}

class ContaPoupanca extends ContaBancaria {
    public $taxaRendimento;

    public function __construct($titular, $saldo, $taxaRendimento) {
        parent::__construct($titular, $saldo);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $rendimento = $this->saldo * ($this->taxaRendimento / 100);
        $this->saldo += $rendimento;
        echo "Rendimento de {$this->taxaRendimento}% aplicado.<br>";
    }
}

$cenario = $_GET['cenario'] ?? 'todos';

echo "Exercício 5 — Contas Bancárias<br><br>";

if ($cenario === 'valido' || $cenario === 'todos') {
    $conta = new ContaBancaria("João Pereira", 1000.00);

    echo "Cenário Válido - Operações Básicas:<br><br>";
    echo "Saldo Inicial:<br>";
    $conta->consultarSaldo();

    echo "<br>Executando Depósito e Saque:<br>";
    $conta->depositar(500.00);
    $conta->sacar(200.00);

    echo "<br>Saldo Final:<br>";
    $conta->consultarSaldo();
    echo "<br>";
}

if ($cenario === 'invalido' || $cenario === 'todos') {
    $contaTeste = new ContaBancaria("João Pereira", 1300.00);

    echo "Cenário Inválido - Saque Superior ao Saldo Disponível:<br><br>";
    echo "Saldo antes da tentativa de saque:<br>";
    $contaTeste->consultarSaldo();

    echo "<br>Tentando sacar R$ 2.000,00:<br>";
    $contaTeste->sacar(2000.00);

    echo "<br>Comprovação do saldo inalterado:<br>";
    $contaTeste->consultarSaldo();
}
