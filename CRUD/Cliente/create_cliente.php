<?php
include 'db.php';
include 'Cliente.php';

$cliente = new Cliente($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    if ($cliente->create($nome, $telefone, $endereco, $senha)) {
        echo "Cliente criado com sucesso!";
    } else {
        echo "Erro ao criar cliente.";
    }
}
?>

<form method="post" action="create_cliente.php">
    Nome: <input type="text" name="nome" required><br>
    Telefone: <input type="text" name="telefone" required><br>
    Endereço: <input type="text" name="endereco" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Criar Cliente">
</form>
 