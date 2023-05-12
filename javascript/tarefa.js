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

/** 1) Percorra o objeto clientes e mostre o nome da cada cliente da seguinte maneira:
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

/** 2) Formate a variável “numero” para o seguinte formato: “(XX)_X_XXXX-XXXX”; */

var numero = "5(1)9-876-543-21";

function formatarNumero(numero) {
    return numero.replace(/\D/g, "")
        .replace(/(\d{2})(\d)(\d{4})(\d{4})/, '($1)$2_$3-$4');
}

console.log(formatarNumero(numero));