<?php

require_once 'C:\Turma2\xampp\htdocs\EnerVision\model\Dispositivo.php';

class DispositivoController
{
    private $dispositivo;

    public function __construct($pdo)
    {
        $this->dispositivo = new Dispositivo($pdo);
    }

    public function cadastrar($nome_usuario, $email_usuario, $senha_usuario, $data_usuario, $imagem)
    {
        $resultado = $this->dispositivo->cadastrar($nome_usuario, $email_usuario, $senha_usuario, $data_usuario, $imagem);
        if ($resultado) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário!";
        }
    }

    public function login($email_usuario, $senha_usuario)
    {
        $usuario = $this->dispositivo->login($email_usuario, $senha_usuario);

        if ($usuario) {
            $_SESSION["usuario_id"] = $usuario["id"];
            header("Location: ../index2.php");
        } else {
            echo "Login inválido!";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: view/login.php");
    }

    public function updimagem($imagem) {
        $this->dispositivo->updimagem($imagem);
    }
}
