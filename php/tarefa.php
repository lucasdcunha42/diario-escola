    <?php

    //1) Utilizando a variável $arrayDeClientes de um echo no nome do segundo cliente.

    $nomes = ['Francisco Souza', 'Guilherme Rosa', 'Arthur Golveia'];

    $cliente1 = new stdClass();
    $cliente1-> nome = $nomes[0];

    $cliente2 = new stdClass();
    $cliente2-> nome = $nomes[1];

    $cliente3 = new stdClass();
    $cliente3-> nome = $nomes[2];

    $arrayDeClientes = [$cliente1, $cliente2, $cliente3];

    echo "<h4>Tarefa Php - 1) Utilizando a variável arrayDeClientes de um echo no nome do segundo cliente. </h4>";
    echo $arrayDeClientes[1]->nome . "</br>";

    echo "<h4>Tarefa Php - 2) Utilize a estrutura de dados arrayDeNascimento para adicionar na estrutura
    arrayDeClientes a data de nascimento de cada cliente. </h4>";

    $arrayDeNascimento = [
        'Francisco Souza' => '10-12-1996',
        'Arthur Golveia' => '14-01-2000',
        'Guilherme Rosa' => '26-05-1985',
        'Marcelo Planalto' => '26-05-1985'
    ];

    foreach($arrayDeClientes as $cliente) {
        $nomeCliente = $cliente->nome;
        if(isset($arrayDeNascimento[$nomeCliente])) {
            $cliente->dataNascimento = $arrayDeNascimento[$nomeCliente];
        }
    }

    foreach($arrayDeClientes as $cliente) {
        echo "Nome do Cliente: " . $cliente->nome;
        if(isset($cliente->dataNascimento)) {
            echo ", Data de Nascimento: " . $cliente->dataNascimento;
        }
        echo "<br/>";
    }
    
    ?>