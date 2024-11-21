<?php

    if(isset($_POST['submit'])) {
        include('confi.php');

        $nome = $_POST['nome']; 
        $email = $_POST['email']; 
        $senha = $_POST['senha']; 
        $cpf = $_POST['cpf']; 
        $telefone = $_POST['telefone']; 
        $endereco = $_POST['endereco']; 
        $tipo = $_POST['tipo']; 
        $crm = isset($_POST['crm']) ? $_POST['crm'] : null; $especialidade = isset($_POST['especialidade']) ? $_POST['especialidade'] : null;

        $sql_usuarios = "INSERT INTO usuarios (email, senha, data_cadastro, ativo, tipo_perfil)
        VALUES ('$email', '$senha', CURDATE(), 1, '$tipo')";

        if ($conexao->query($sql_usuarios) === TRUE) {
            $usuarios_id = $conexao->insert_id;

            $sql_pessoas = "INSERT INTO pessoas (usuarios_id, cpf, nome)
            VALUES ('$usuarios_id','$cpf','$nome')";
            if ($conexao->query($sql_pessoas) === TRUE) {
                echo "Cadastro realizado com sucesso!";

                if ($tipo == 1 && $crm && $especialidade) {
                    $sql_medico = "INSERT INTO medico (pessoas_id, crm, especialidade)
                    VALUES ('$usuarios_id', '$crm', '$especialidade')";
                    if ($conexao->query($sql_medico) === TRUE) {
                        echo "Cadastro realizado com sucesso!";
                    }else{
                        echo "Erro ao realizar o cadastro" . $conexao->error;
                    }
                }
            }else{
                echo "Erro ao cadastrar" . $conexao->error;
            }         
    }else{
        echo "Erro ao cadastrar" . $conexao->error;
    }

    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - DigitalCare</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="cadastro-container">
        <h2>Cadastro - DigitalCare</h2>
        <form id="cadastroForm" onsubmit="return cadastrarUsuario(event)" method="POST">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="input-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required>
            </div>
            <div class="input-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" id="dataNascimento" name="dataNascimento" required>
            </div>
            <div class="input-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone">
            </div>
            <div class="input-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <div class="input-group">
                <label for="tipo">Tipo de Usuário</label>
                <select id="tipo" name="tipo" onchange="toggleCamposMedico()" required>
                    <option value="0">Paciente</option>
                    <option value="1">Médico</option>
                </select>
            </div>

            <div id="camposMedico" style="display: none;">
                <div class="input-group">
                    <label for="crm">CRM</label>
                    <input type="text" id="crm" name="crm">
                </div>
                <div class="input-group">
                    <label for="especialidade">Especialidade</label>
                    <input type="text" id="especialidade" name="especialidade">
                </div>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
