<?php
include 'db.php';
include 'Produto.php';

$produto = new Produto($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if ($produto->delete($id)) {
        echo "Produto deletado com sucesso!";
    } else {
        echo "Erro ao deletar produto.";
    }
} else {
    $id = $_GET['id'];
}
?>

<form method="post" action="delete_produto.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Deletar Produto">
</form>
