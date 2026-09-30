<?php

require_once 'model.php';

function validar_login(string $email, string $senha, array $usuarios): array
{
    foreach ($usuarios as $usuario) {

        if ($usuario->email === $email) {

            if ($usuario->verificarSenha($senha)) {
                return [
                    'status' => true,
                    'mensagem' => 'Login realizado com sucesso!',
                    'usuario' => $usuario
                ];
            }

            return [
                'status' => false,
                'mensagem' => 'Senha incorreta.',
                'usuario' => null
            ];
        }
    }

    return [
        'status' => false,
        'mensagem' => 'E-mail não encontrado.',
        'usuario' => null
    ];
}
