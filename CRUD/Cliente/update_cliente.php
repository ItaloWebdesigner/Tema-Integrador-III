<?php
include 'db.php';
include 'Cliente.php';

$cliente = new Cliente($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    if ($cliente->update($id, $nome, $telefone, $endereco, $senha)) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar cliente.";
    }
} else {
    $id = $_GET['id'];
    $clientes = $cliente->read();
    $cli = null;
    foreach ($clientes as $c) {
        if ($c['id'] == $id) {
            $cli = $c;
            break;
        }
    }
}
?>

<?php if ($cli) { ?>
    <form method="post" action="update_cliente.php">
        <input type="hidden" name="id" value="<?php echo $cli['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $cli['nome']; ?>" required><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $cli['telefone']; ?>" required><br>
        Endereço: <input type="text" name="endereco" value="<?php echo $cli['endereco']; ?>" required><br>
        Senha: <input type="password" name="senha" value="<?php echo $cli['senha']; ?>" required><br>
        <input type="submit" value="Atualizar Cliente">
    </form>
<?php } else { ?>
    Cliente não encontrado.
<?php } ?>
 