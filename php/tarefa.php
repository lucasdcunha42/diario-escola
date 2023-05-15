    <?php

    const quebraLinha = "</br>";

    $nomes = ['Francisco Souza', 'Guilherme Rosa', 'Arthur Golveia'];

    $cliente1 = new stdClass();
    $cliente1->nome = $nomes[0];

    $cliente2 = new stdClass();
    $cliente2->nome = $nomes[1];

    $cliente3 = new stdClass();
    $cliente3->nome = $nomes[2];

    $arrayDeClientes = [$cliente1, $cliente2, $cliente3];

    echo "<h4>Tarefa Php - 1) Utilizando a variável \$arrayDeClientes de um echo no nome do segundo cliente. </h4>";
    echo $arrayDeClientes[1]->nome . quebraLinha;

    echo "<h4>Tarefa Php - 2) Utilize a estrutura de dados \$arrayDeNascimento para adicionar na estrutura
    \$arrayDeClientes a data de nascimento de cada cliente. </h4>";

    $arrayDeNascimento = [
        'Francisco Souza' => '10-12-1996',
        'Arthur Golveia' => '14-01-2000',
        'Guilherme Rosa' => '26-05-1985',
        'Marcelo Planalto' => '26-05-1985'
    ];

    adicionarDataDeNascimentoACliente($arrayDeClientes, $arrayDeNascimento);
    imprimirClientes($arrayDeClientes, "nome", "dataNascimento", "banana", "alicate");

    function adicionarDataDeNascimentoACliente(array $arrayDeClientes, array $arrayDeNascimento)
    {
        foreach ($arrayDeClientes as $cliente) {
            $nomeCliente = $cliente->nome;

            if (isset($arrayDeNascimento[$nomeCliente])) {
                $cliente->dataNascimento = $arrayDeNascimento[$nomeCliente];
            }
        }
    }
    function imprimirClientes(array $arrayDeClientes, ...$campos)
    {
        $camposNaoEncontrados = array();

        foreach ($arrayDeClientes as $cliente) {

            foreach ($campos as $campo) {

                if (isset($cliente->$campo)) {
                    echo ucfirst($campo) . ": " . $cliente->$campo . quebraLinha;
                } else {
                    $camposNaoEncontrados[] = $campo;
                }
            }
            echo quebraLinha;
        }

        if (!empty($camposNaoEncontrados)) {
            echo ("Estes Campos não foram encontrados : " . quebraLinha);
            echo (implode(quebraLinha, array_unique($camposNaoEncontrados)));
        }
    }

    echo "<h4>Tarefa Php - 3) Faça a ordenação e impressão da estrutura \$arrayDeClientes resultante do exercício
    2 pela data de nascimento (pode ser ascendente ou descendente). </h4>";

    ordenarDataNascimento($arrayDeNascimento, "descendente");
    function ordenarDataNascimento(array $arrayDeNascimento, String $ordem)
    {
        foreach ($arrayDeNascimento as $pessoa => $dataNascimento) {
            $timestamp = strtotime($dataNascimento);
            $arrayDeNascimento[$pessoa] = $timestamp;
        }

        if (strcasecmp("ascendente", $ordem) == 0) {
            asort($arrayDeNascimento);
        } elseif (strcasecmp("descendente", $ordem) == 0) {
            arsort($arrayDeNascimento);
        } else {
            echo "Escolher como 'ascendente' ou 'descendente' a ordenação.";
        }
        foreach ($arrayDeNascimento as $pessoa => $timestamp) {
            echo $pessoa . ': ' . date('d-m-Y', $timestamp) . quebraLinha;
        }
    }
    
    ?>