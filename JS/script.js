// abrir dropdown do menu

function toggleDropdown(id) {
    var dropdown = document.getElementById(id);

    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
}

 // circulo para carregar página
 function carregar() {
    const formulario_login = document.getElementById('div-formulario-login');
    const loading = document.getElementById('carregar-login');

    // oculta o formulário
    formulario_login.style.display = 'none';

    // coloca o icone de carregar
    loading.style.display = 'block';

}


// função para mostrar a senha
function showPassword() {
    var checkboxSenha = document.getElementById('senha-login');
    checkboxSenha.type = (checkboxSenha.type === 'password') ? 'text' : 'password';
}

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouro').value=("");
    document.getElementById('bairro').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('logradouro').value="...";
        document.getElementById('bairro').value="...";
        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};



function fadeIn(element) {
    element.style.display = 'flex';
    element.style.opacity = 0;

    function fadeInStep() {
        element.style.opacity = parseFloat(element.style.opacity) + 0.1;
        if (parseFloat(element.style.opacity) < 1) {
            requestAnimationFrame(fadeInStep);
        }
    }

    requestAnimationFrame(fadeInStep);
}

function fadeOut(element) {
    function fadeOutStep() {
        element.style.opacity = parseFloat(element.style.opacity) - 0.1;
        if (parseFloat(element.style.opacity) > 0) {
            requestAnimationFrame(fadeOutStep);
        } else {
            element.style.display = 'none';
        }
    }

    requestAnimationFrame(fadeOutStep);
}


// abrir modal de cadastro
function abrirModal(modal){
    var open = document.getElementById(modal);

    open.style.display === 'none' ? fadeIn(open) : fadeOut(open);
    
}

function toggleVigenciaInputs() {
    var situacaoSelect = document.getElementById('input-situacao-local');
    var vigenciaDiv = document.getElementById('div-vigencia-inputs');

    // Se a opção selecionada for 'Alugado' ou 'Cedido', mostra a div de vigência, caso contrário, esconde
    if (situacaoSelect.value === 'Alugado' || situacaoSelect.value === 'Cedido') {
        vigenciaDiv.style.display = 'flex';
    } else {
        vigenciaDiv.style.display = 'none';
    }
}