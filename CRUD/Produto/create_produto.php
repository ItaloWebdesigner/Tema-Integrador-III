<?php
include 'db.php';
include 'Produto.php';

$produto = new Produto($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    if ($produto->create($nome, $descricao, $preco, $estoque)) {
        echo "Produto criado com sucesso!";
    } else {
        echo "Erro ao criar produto.";
    }
}
?>

<form method="post" action="create_produto.php">
    Nome: <input type="text" name="nome" required><br>
    Descrição: <input type="text" name="descricao" required><br>
    Preço: <input type="text" name="preco" required><br>
    Estoque: <input type="number" name="estoque" required><br>
    <input type="submit" value="Criar Produto">
</form>
