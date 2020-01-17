<?php

namespace App;

use App\Manager;

class DeleteController
{
    private $deleta;

    public function __construct($id)
    {
        $this->deleta = new Manager();
        
        if ($this->deleta->delete('dividas', $id) == true) {
            echo "<script>alert('Registro deletado com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
