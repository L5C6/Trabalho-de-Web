function validateForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');

    if (username === "" || password === "") {
        errorMessage.textContent = "Por favor, preencha todos os campos.";
        return false;
    }

    if (username !== "admin" || password !== "senha123") {
        errorMessage.textContent = "Usuário ou senha inválidos.";
        return false;
    }

    alert("Login bem-sucedido!");
    window.location.href = "home-paciente.html";
    return true;
}
function toggleCamposMedico() {
    const tipo = document.getElementById('tipo').value;
    const camposMedico = document.getElementById('camposMedico');

    if (tipo === "1") {
        camposMedico.style.display = "block";
    } else {
        camposMedico.style.display = "none";
    }
}
function cadastrarUsuario(event) {
    event.preventDefault();

    const tipo = document.getElementById('tipo').value;

    if (tipo === "1") {
        window.location.href = "home-medico.html"; 
    } else {
        window.location.href = "home-paciente.html"; 
    }
}
function enviarMensagem() {
    var input = document.getElementById('chatInput').value;
    var messagesDiv = document.getElementById('messages');
    
    if (input.trim() !== "") { 
        var message = document.createElement('div');
        message.textContent = "Você: " + input;
        messagesDiv.appendChild(message);
        document.getElementById('chatInput').value = '';
    } else {
        alert("Por favor, digite uma mensagem.");
    }
}
