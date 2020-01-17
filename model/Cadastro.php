<?php

namespace App;

require_once("banco.php");

class Cadastro extends Conexao
{
    private $nome;
    private $cnpj_cpf;
    private $data_nascimento;
    private $endereco;
    private $titulo;
    private $valor;
    private $data_vencimento;

    //Metodos Set
    public function setNome($string)
    {
        $this->nome = $string;
    }
    
    public function setCnpjCpf($string)
    {
        $this->cnpj_cpf = $string;
    }
    
    public function setDataNascimento($string)
    {
        $this->data_nascimento = $string;
    }

    public function setEndereco($string)
    {
        $this->endereco = $string;
    }

    public function setTitulo($string)
    {
        $this->titulo = $string;
    }

    public function setValor($string)
    {
        $this->valor = $string;
    }

    public function setDataVencimento($string)
    {
        $this->data_nascimento = $string;
    }

    //Metodos Get
    public function getNome()
    {
        return $this->nome;
    }
    
    public function getCnpjCpf()
    {
        return $this->cnpj_cpf;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getVaolor()
    {
        return $this->valor;
    }

    public function getDataVencimento()
    {
        return $this->data_vencimento;
    }

    public function incluir()
    {
        $devedor = $this->setDevedor(
            $this->getNome(),
            $this->getCnpjCpf()(),
            $this->getDataNascimento(),
            $this->getEndereco()
        );

        $this->setDividas(
            $this->getTitulo()(),
            $this->getDataVencimento(),
            $this->getValor(),
            $devedor
        );
    }
}
