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

function consultarCEP(){
    document.getElementById('cep').addEventListener('input', function() {
        var cep = this.value;

        cep = cep.replace(/\D/g, '');

        if (cep.length === 8) {
            // Consultar a API do ViaCEP
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => preencherCampos(data))
                .catch(error => console.error('Erro ao consultar o CEP:', error));
        }
    });
}

function preencherCampos(data) {
    document.getElementById('logradouro').value = data.logradouro;
    document.getElementById('bairro').value = data.bairro;
    // Outros campos podem ser preenchidos da mesma maneira
}


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