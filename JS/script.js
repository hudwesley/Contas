// abre e fecha as opções do dropdown
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