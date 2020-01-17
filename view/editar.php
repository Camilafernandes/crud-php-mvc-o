<?php

include_once '../model/Conexao.php';
require_once("../controller/EditController.php");

use App\Conexao;

$manager = new Conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.html"); ?>

<body>
    <?php include("menu.php"); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cadastro</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cadastro</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="../controller/EditController.php" id="form" name="form">
                                    <div class="row">
                                        <?php foreach ($manager->getCredoresByIdDivida($_POST['id']) as $dados) : ?>
                                        <div class="col-sm-6">
                                        <!-- text input -->
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="devedores[nome]" 
                                                value="<?php echo $dados['nome']?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Date Nascimento:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        data-inputmask-alias="datetime" 
                                                        id="data_nascimento"
                                                        name="devedores[data_nascimento]"
                                                        data-inputmask-inputformat="dd-mm-yyyy" data-mask
                                                        value="<?php echo $dados['data_nascimento']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>CNPJ /CPF </label>
                                                <input type="text" id="cnpj_cpf" class="form-control" 
                                                name="devedores[cnpj_cpf]"
                                                value="<?php echo $dados['cnpj_cpf']?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Endereço </label>
                                                <input type="text" id="endereco" class="form-control" 
                                                name="devedores[endereco]"
                                                value="<?php echo $dados['endereco']?>">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                        <!-- text input -->
                                            <div class="form-group">
                                                <label>Descrição do Título</label>
                                                <input type="text" class="form-control" id="descricao_titulo" 
                                                    name="dividas[descricao_titulo]"
                                                    value="<?php echo $dados['descricao_titulo']?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Date Vencimento:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                    </div>
                                                    <input type="text" class="form-control" 
                                                        data-inputmask-alias="datetime" 
                                                        id="data_vencimento"
                                                        name="dividas[data_vencimento]"
                                                        value="<?php echo $dados['data_vencimento']?>"
                                                        data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Valor </label>
                                                <input type="text" id="valor" class="form-control" 
                                                    name="dividas[valor]"
                                                    value="<?php echo $dados['valor']?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_divida" 
                                            value="<?php echo $dados['id_divida'] ?>">
                                        <input type="hidden" name="id_devedor" 
                                            value="<?php echo $dados['id_devedor'] ?>">
                                        <?php endforeach; ?>
                                    </div>    
                                    
                                    <button type="submit" class="btn btn-success float-right">
                                        <i class="far fa-credit-card"></i> Editar
                                    </button>            
                                </form>
                            </div>
                        <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#cnpjcpf").mask("000.000.000-00");
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        })
    </script>
</body>
</html>

