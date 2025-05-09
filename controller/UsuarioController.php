<?php
class UsuarioController {
    private $usuarioModel;

    public function __construct($usuarioModel) {
        $this->usuarioModel = $usuarioModel;
    }

    public function getFotoPerfil($idUsuario) {
        return $this->usuarioModel->getFotoPerfil($idUsuario);
    }
}