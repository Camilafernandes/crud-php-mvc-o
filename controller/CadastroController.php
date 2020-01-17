<?php

namespace App;

use App\Cadastro;

class CadastroController
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir()
    {
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setCnpjCpf($_POST['cnpj_cpf']);
        $this->cadastro->setDataNascimeto($_POST['data_nascimento']);
        $this->cadastro->setEndereco($_POST['endereco']);
        $this->cadastro->setDescricaoTitulo($_POST['descricao_titulo']);
        $this->cadastro->setValor($_POST['valor']);
        $this->cadastro->setDataVencimento(date('Y-m-d', strtotime($_POST['data_vencimento'])));
        
        $result = $this->cadastro->incluir();

        if ($result >= 1) {
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!, verifique se o devedor não está duplicado');
            history.back()</script>";
        }
    }
}
