<?php

class Entrega {
    public $codigo;
    public $destino;
    public $distancia;

    public function __construct($codigo, $destino, $distancia) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados() {
        echo "Código: {$this->codigo} | Destino: {$this->destino} | Distância: {$this->distancia} km<br>";
    }
}

class EntregaMoto extends Entrega {
    public $placaMoto;
    public $nomeEntregador;

    public function __construct($codigo, $destino, $distancia, $placaMoto, $nomeEntregador) {
        parent::__construct($codigo, $destino, $distancia);
        $this->placaMoto = $placaMoto;
        $this->nomeEntregador = $nomeEntregador;
    }

    public function realizarEntrega() {
        echo "Entrega de Moto realizada por {$this->nomeEntregador} (Placa: {$this->placaMoto}) até {$this->destino} ({$this->distancia} km).<br>";
    }
}

class EntregaDrone extends Entrega {
    public $modeloDrone;
    public $bateriaRestante;

    public function __construct($codigo, $destino, $distancia, $modeloDrone, $bateriaRestante) {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloDrone = $modeloDrone;
        $this->bateriaRestante = $bateriaRestante;
    }

    public function realizarEntrega() {
        if ($this->distancia > 20) {
            echo "Operação Recusada: A entrega por drone não é permitida para distâncias superiores a 20 km. (Distância solicitada: {$this->distancia} km).<br>";
            return false;
        }
        echo "Entrega por Drone autorizada e realizada com sucesso! Drone: {$this->modeloDrone} | Bateria: {$this->bateriaRestante}% | Distância: {$this->distancia} km.<br>";
        return true;
    }
}

$cenario = $_GET['cenario'] ?? 'todos';

echo "Exercício 7 — Sistema de Entregas<br><br>";

if ($cenario === 'valido' || $cenario === 'todos') {
    $moto = new EntregaMoto("ENT-001", "Rua das Flores, 120", 12, "ABC-1234", "Rodrigo Alves");
    $droneValido = new EntregaDrone("DRN-001", "Av. Central, 450", 8, "DJI FlyCart 30", 95);

    echo "Cenário Válido - Entrega Moto e Entrega Drone (8 km):<br><br>";
    echo "Entrega Moto:<br>";
    $moto->exibirDados();
    $moto->realizarEntrega();

    echo "<br>Entrega Drone (8 km):<br>";
    $droneValido->exibirDados();
    $droneValido->realizarEntrega();
    echo "<br>";
}

if ($cenario === 'invalido' || $cenario === 'todos') {
    $droneInvalido = new EntregaDrone("DRN-002", "Rodovia Raposo Tavares, km 30", 25, "DJI FlyCart 30", 80);

    echo "Cenário Inválido - Entrega Drone (25 km):<br><br>";
    echo "Dados da solicitação:<br>";
    $droneInvalido->exibirDados();
    $droneInvalido->realizarEntrega();
    echo "<br>";
}

echo "Hierarquia de Classes e Membros:<br>";
echo "<pre>
+-----------------------------------------------------------------------+
|                              Entrega                                  |
|-----------------------------------------------------------------------|
| - Atributos herdados: codigo, destino, distancia                      |
| - Método herdado: exibirDados()                                       |
+-----------------------------------------------------------------------+
                                    |
          +-------------------------+-------------------------+
          |                                                   |
+-----------------------------------+   +-------------------------------+
|           EntregaMoto             |   |         EntregaDrone          |
|-----------------------------------|   |-------------------------------|
| - Atributos próprios:             |   | - Atributos próprios:         |
|     placaMoto, nomeEntregador     |   |     modeloDrone, bateria      |
| - Método específico:              |   | - Método específico:          |
|     realizarEntrega()             |   |     realizarEntrega() (<=20km)|
+-----------------------------------+   +-------------------------------+
</pre>";
