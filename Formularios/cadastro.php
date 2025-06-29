<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); //criptografa a senha

    $sql = "INSERT INTO dados (nome, email, telefone, cpf, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    //liga valores com ? ( o "s" indica val)
    $stmt->bind_param("sssss", $nome, $email, $telefone, $cpf, $senha);
   
    if($stmt->execute()){
        echo "Cadastro realizado com sucesso!";
    }else{
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}
?>