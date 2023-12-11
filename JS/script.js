
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


    if (checkboxSenha.type === 'password') {
        checkboxSenha.type = 'text';
    } else {
        checkboxSenha.type = 'password';
    }
}
function consultarCEP(){
    document.getElementById('cep').addEventListener('input', function() {
        var cep = this.value;

        // Formatar o CEP removendo caracteres não numéricos
        cep = cep.replace(/\D/g, '');

        // Verificar se o CEP possui 8 caracteres numéricos
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

// abrir modal de cadastro
function abrirModal(modal){
    var open = document.getElementById(modal);

    open.style.display === 'none' ? fadeIn(open) : fadeOut(open);
    
}

// animação de aparecer
function fadeIn(element) {
    element.style.display = 'flex';
    element.style.opacity = 0;

    let opacity = 0;
    const fadeInInterval = setInterval(function() {
        if (opacity < 1) {
            opacity += 0.1;
            element.style.opacity = opacity;
        } else {
            clearInterval(fadeInInterval);
        }
    }, 50);
}

// animação desaparecer
function fadeOut(element) {
    let opacity = 1;
    const fadeOutInterval = setInterval(function() {
        if (opacity > 0) {
            opacity -= 0.1;
            element.style.opacity = opacity;
            
        } else {
            element.style.display = 'none';
            clearInterval(fadeOutInterval);
        }
    }, 50);
}