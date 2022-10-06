<?php

class Artigo
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('select * from artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function exibirArtigo(string $id)
    {
        $selecionaArtigo = $this->mysql->prepare('select * from artigos where id = ?');
        $selecionaArtigo->bind_param('s',$id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        
        return $artigo;
    }

    public function adicionarArtigo(string $titulo, string $conteudo): void
    {
        $inserir = $this->mysql->prepare('insert into artigos (titulo, conteudo) values (?, ?)');
        $inserir->bind_param('ss', $titulo, $conteudo);
        $inserir->execute();
    }

    public function remover(string $id): void
    {
        $removeArquivo = $this->mysql->prepare('delete from artigos where id = ?');
        $removeArquivo->bind_param('s', $id);
        $removeArquivo->execute();
    }

    public function editar(string $titulo, string $conteudo, string $id): void
    {
        $editaArtigo = $this->mysql->prepare('update artigos set titulo = ?, conteudo = ? where id = ?');
        $editaArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editaArtigo->execute();
    }
}   