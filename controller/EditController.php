<?php

namespace App;

use App\Conexao;

class EditController
{
    private $editar;
    private $nome;
    private $cnpj_cpf;
    private $data_nascimento;
    private $endereco;
    private $descricao_titulo;
    private $valor;
    private $data_vencimento;

    public function __construct($id)
    {
        $this->editar = new Conexao();
        $this->criarFormulario($id);
    }

    private function criarFormulario($id)
    {
        $row = $this->editar->getInfo('devedor', $id);
        $this->nome             = $row['nome'];
        $this->cnpj_cpf         = $row['cnpj_cpf'];
        $this->data_nascimento  = $row['data_nascimento'];
        $this->endereco         = $row['endereco'];

        $row = $this->editar->getInfo('dividas', $id);
        $this->descricao_titulo = $row['descricao_titulo'];
        $this->valor            = $row['valor'];
        $this->data_vencimento  = $row['data_vencimento'];
    }
    
    public function editarFormulario(
        $nome,
        $cnpj_cpf,
        $data_nascimento,
        $endereco,
        $descricao_titulo,
        $valor,
        $data_vencimento,
        $id
    ) {
        if ($this->editar->update('devedor', $nome, $cnpj_cpf, $data_nascimento, $endereco, $id) == true &&
            $this->editar->update('dividas', $descricao_titulo, $valor, $data_vencimento, $id) == true
        ) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getNome()
    {
        return $this->nome;
    }
    
    public function getCnpjCpf()
    {
        return $this->cnpj_cpf;
    }
    
    public function getDataNascimeto()
    {
        return $this->data_nascimento;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
   
    public function getDescricaoTitulo()
    {
        return $this->descricao_titulo;
    }
    
    public function getValor()
    {
        return $this->valor;
    }
    
    public function getDataVencimento()
    {
        return $this->data_vencimento;
    }
}
