<?php

namespace App;

use mysqli;

require_once("../init.php");

class Conexao
{

    protected $mysqli;

    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {
        $this->mysqli = new mysqli(BD_HOST, BD_USER, BD_PASSWORD, BD_DATABASE);
    }

    public function setDevedor($nome, $cnpj_cpf, $data_nascimento, $endereco)
    {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO devedores (`nome`, `autor`, `quantidade`, `preco`, `data`)
            VALUES (?,?,?,?,?)"
        );

        $stmt->bind_param("sssss", $nome, $cnpj_cpf, $data_nascimento, $endereco);

        if ($stmt->execute() != true) {
            return false ;
        }

        return true;
    }

    public function setDividas($titulo, $valor, $data_vencimento, $id_devedor)
    {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO dividas (`nome`, `autor`, `quantidade`, `preco`, `data`)
            VALUES (?,?,?,?,?)"
        );

        $stmt->bind_param("sssss", $titulo, $valor, $data_vencimento, $id_devedor);

        if ($stmt->execute() != true) {
            return false ;
        }

        return true;
    }

    public function getCredores()
    {
        $result = $this->mysqli->query(
            "SELECT * FROM dividas as dv
            INNER JOIN devedores as dev 
            ON dv.id_devedor = dev.id_devedor"
        );

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        return $array;
    }

    public function getCredoresByIdDivida($id_divida)
    {
        $result = $this->mysqli->query(
            "SELECT * FROM dividas as dv
            INNER JOIN devedores as dev 
            ON dv.id_devedor = dev.id_devedor
            WHERE `id_divida` = $id_divida"
        );

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }

        return $array;
    }

    public function deleteDivida($id)
    {
        if ($this->mysqli->query("DELETE FROM `dividas` WHERE `id_divida` = '".$id."';") != true) {
            return false;
        }

        return true;
    }

    public function updateDivida($titulo, $valor, $data_vencimento)
    {
        $stmt = $this->mysqli->prepare(
            "UPDATE `dividas` SET `titulo` = ?, `valor`=?, `data_vencimento`=? WHERE `id_divida` = ?"
        );
        
        $stmt->bind_param("sssssss", $titulo, $valor, $data_vencimento);
        if ($stmt->execute() != true) {
            return false;
        }

        return true;
    }
}
