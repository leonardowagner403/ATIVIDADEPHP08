<?php

class Usuario
{
    public int $id;
    public string $nome;
    public string $email;
    public string $tipo;

    private string $senha_hash;

    public function saudacao(): string
    {
        return "Olá, {$this->nome}!";
    }

    public function tipo_formatado(): string
    {
        return ucfirst($this->tipo);
    }

    public function definirSenha(string $senha): void
    {
        $this->senha_hash = password_hash($senha, PASSWORD_BCRYPT);
    }

    public function verificarSenha(string $senha): bool
    {
        return password_verify($senha, $this->senha_hash);
    }
}


class Instrutor extends Usuario
{
    public array $materias_leciona = [];
}


class Aluno extends Usuario
{
    public int $xp_total = 0;
}
