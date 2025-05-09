<?php
class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getFotoPerfil($idUsuario) {
        $stmt = $this->pdo->prepare("SELECT foto_perfil FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['foto_perfil'] ?? 'img/free-user-icon-3296-thumb.png';
        }

        return null;
    }

    public function uptimage($imagem) {
        $sql = "INSERT INTO usuarios ()";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
}