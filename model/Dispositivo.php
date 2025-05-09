<?php

class Dispositivo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome_usuario, $email_usuario, $senha_usuario, $data_usuario, $imagem) {
        $hash = password_hash($senha_usuario, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, data_usuario, imagem) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nome_usuario, $email_usuario, $hash, $data_usuario, $imagem]);
    }

    public function login($email_usuario, $senha_usuario) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email_usuario = ?");
        $stmt->execute([$email_usuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($usuario && password_verify($senha_usuario, $usuario["senha_usuario"])) {
            session_start();
            $_SESSION["usuario_id"] = $usuario["id_usuario"];
            $_SESSION["nome_usuario"] = $usuario["nome_usuario"];
            return $usuario;
        }
        
        return false;
    }
    
}

?>
