var clientes = [
    {
        'id': 1,
        'nome': 'Luis Santos Silveira',
        'idade': 18
    },
    {
        'id': 2,
        'nome': 'Ricardo Lopes Alves',
        'idade': 30
    },
    {
        'id': 3,
        'nome': 'Gustavo Silva Junior',
        'idade': 26
    }
];

/* 1) Percorra o objeto clientes e mostre o nome da cada cliente da seguinte maneira:
“ultimoSobrenome, primeiroNome”; */

function formatarNome(nomeCompleto) {
    var partesNome = nomeCompleto.split(' ');
    return partesNome.shift() + ', ' + partesNome.pop();
}
  
  function imprimirClientes(clientes) {
    clientes.forEach(cliente => {
      console.log(formatarNome(cliente.nome));
    });
}
  
imprimirClientes(clientes);  