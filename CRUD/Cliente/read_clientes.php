<?php
include 'db.php';
include 'Cliente.php';

$cliente = new Cliente($conn);
$clientes = $cliente->read();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Endereço</th>
    </tr>
    <?php foreach ($clientes as $cli) { ?>
        <tr>
            <td><?php echo $cli['id']; ?></td>
            <td><?php echo $cli['nome']; ?></td>
            <td><?php echo $cli['telefone']; ?></td>
            <td><?php echo $cli['endereco']; ?></td>
        </tr>
    <?php } ?>
</table>
 