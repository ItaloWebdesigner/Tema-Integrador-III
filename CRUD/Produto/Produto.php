<?php
class Produto {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($nome, $descricao, $preco, $estoque) {
        $sql = "INSERT INTO Produto (nome, descricao, preco, estoque) VALUES (:nome, :descricao, :preco, :estoque)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estoque', $estoque);
        return $stmt->execute();
    }

    public function read() {
        $sql = "SELECT * FROM Produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $descricao, $preco, $estoque) {
        $sql = "UPDATE Produto SET nome = :nome, descricao = :descricao, preco = :preco, estoque = :estoque WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estoque', $estoque);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM Produto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
