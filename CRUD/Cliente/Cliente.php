<?php
class Cliente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($nome, $telefone, $endereco, $senha) {
        $sql = "INSERT INTO Cliente (nome, telefone, endereco, senha) VALUES (:nome, :telefone, :endereco, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    public function read() {
        $sql = "SELECT * FROM Cliente";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $telefone, $endereco, $senha) {
        $sql = "UPDATE Cliente SET nome = :nome, telefone = :telefone, endereco = :endereco, senha = :senha WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM Cliente WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
  