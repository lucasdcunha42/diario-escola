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


/** 3) Qual a ordem dos prints no console? 
 * R: a ordem no console seria:
 * 
 * A função é: c
 * A função é: d
 * 
 * Pois a função b() retorna antes da chamada do alertUser(),
 * e a chamada do alertUser("a") nunca é realizada, pois a promessa
 * da função d() não foi resolvida.
 * 
*/

/** 4) Existe algum erro nesse código? Se sim, comente sobre? 
 * 
 * No 1º codigo a alteração de {} para [] na criação do objeto,
 * alteração das aspas utilizadas para ' ou ", e o fechamento 
 * das aspas simples no nome do objeto de id:2.
 * 
 * 2º codigo comentado abaixo.
*/

async function a(){
    b(); 
    await c(); 
    await d(); 
    alertUser("a") // utilização do ";" como boa pratica e manter consistencia entre " e '.
}
a();

//função retona sem chamar o alertUser()
function b(){
    return; 
    alertUser('b');
}

//chamada do resolve antes da execução completa da função 
function c() {
    return new Promise((resolve) => {
        resolve(); 
        alertUser('c'); 
    });
} 
//o resolve não é chamado nunca resolvendo a promise
function d() { 
    return new Promise((resolve) => {
        alertUser('d'); 
    });
}

function alertUser(message){
     console.log('A função é: ' + message); 
}