
const baseUrl = "/crudFilmes-main";

const inputNome = document.getElementById('txtTit');
const inputLancamento = document.getElementById('txtLanca');
const inputDiretor = document.getElementById('txtDir');
const inputPais = document.getElementById('selpais');
const inputGenero = document.getElementById('selgen');

const divErros = document.getElementById('divMsgErro');





function inserirFilmes() {


    //Estrutura FormData para enviar os parâmetros
    //no corpo da requisição do tipo POST
    var dados = new FormData();
    dados.append("nome", inputNome.value);
    dados.append("lanca", inputLancamento.value);
    dados.append("dir", inputDiretor.value);-
    dados.append("pais", inputPais.value);
    dados.append("genero", inputGenero.value);

    //Requisição
    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/inserir_filmes.php";

    xhttp.open("POST", url);
    xhttp.onload = function() {
        var resposta = xhttp.responseText;
        console.log(resposta);

        //return;
        
        if(resposta) {
            divErros.innerHTML = resposta;
            divErros.style.display = "block";
        } else {
            //Redirecionar para a listagem
            window.location = "listar.php";
        }
    }
    xhttp.send(dados);
}