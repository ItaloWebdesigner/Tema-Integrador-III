<?php
include 'db.php';
include 'Produto.php';

$produto = new Produto($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    if ($produto->update($id, $nome, $descricao, $preco, $estoque)) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto.";
    }
} else {
    $id = $_GET['id'];
    $produtos = $produto->read();
    $prod = null;
    foreach ($produtos as $p) {
        if ($p['id'] == $id) {
            $prod = $p;
            break;
        }
    }
}
?>

<?php if ($prod) { ?>
    <form method="post" action="update_produto.php">
        <input type="hidden" name="id" value="<?php echo $prod['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $prod['nome']; ?>" required><br>
        Descrição: <input type="text" name="descricao" value="<?php echo $prod['descricao']; ?>" required><br>
        Preço: <input type="text" name="preco" value="<?php echo $prod['preco']; ?>" required><br>
        Estoque: <input type="number" name="estoque" value="<?php echo $prod['estoque']; ?>" required><br>
        <input type="submit" value="Atualizar Produto">
    </form>
<?php } else { ?>
    Produto não encontrado.
<?php } ?>
