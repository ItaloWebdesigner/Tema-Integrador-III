<?php
include 'db.php';
include 'Cliente.php';

$cliente = new Cliente($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if ($cliente->delete($id)) {
        echo "Cliente deletado com sucesso!";
    } else {
        echo "Erro ao deletar cliente.";
    }
} else {
    $id = $_GET['id'];
}
?>

<form
 