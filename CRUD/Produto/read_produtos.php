<?php
include 'db.php';
include 'Produto.php';

$produto = new Produto($conn);
$produtos = $produto->read();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Estoque</th>
    </tr>
    <?php foreach ($produtos as $prod) { ?>
        <tr>
            <td><?php echo $prod['id']; ?></td>
            <td><?php echo $prod['nome']; ?></td>
            <td><?php echo $prod['descricao']; ?></td>
            <td><?php echo $prod['preco']; ?></td>
            <td><?php echo $prod['estoque']; ?></td>
        </tr>
    <?php } ?>
</table>
