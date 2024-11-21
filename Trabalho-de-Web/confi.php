<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'web';

    $conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Teste de Conexão
    /*
    if($conexao->connect_errno){
        echo"Erro";
    }else{
        echo "Conexão realizada com sucesso";
    }
    */
    if (!$conexao) { 
        die("Conexão falhou: " . mysqli_connect_error());}

?>