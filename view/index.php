<?php

include_once '../model/Conexao.php';

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
                        <li class="breadcrumb-item active">Listagem</li>
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
                            <div class="card-body">
                                <h5 class="text-right">
                                    <a href="cadastro.php" class="btn btn-primary btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </h5>
                                <table class="table table-bordered">
                                    <thead>                  
                                        <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nome</th>
                                        <th>CNPJ / CPF</th>
                                        <th>Dt. Nascimento</th>
                                        <th>Endereço</th>
                                        <th>Desc. Título</th>
                                        <th>Valor</th>
                                        <th>Dt. Vencimento</th>
                                        <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($manager->getCredores() as $dados) : ?>
                                        <tr>
                                            <td><?php echo $dados['id_divida']; ?></td>
                                            <td><?php echo $dados['nome']; ?></td>
                                            <td><?php echo $dados['cnpj_cpf']; ?></td>
                                            <td><?php echo date("d/m/Y", strtotime($dados['data_nascimento'])); ?></td>
                                            <td><?php echo $dados['endereco']; ?></td>
                                            <td><?php echo $dados['descricao_titulo']; ?></td>
                                            <td><?php echo $dados['valor']; ?></td>
                                            <td><?php echo date("d/m/Y", strtotime($dados['data_vencimento'])); ?></td>
                                            <td>
                                                <form method="POST" action="../view/editar.php" style="float:left">
                                                    <input type="hidden" name="id" 
                                                        value="<?php echo $dados['id_divida'] ?>">
                                                    <button class="btn btn-warning btn-xs">
                                                        <i class="fa fa-user-edit"></i>
                                                    </button>
                                                </form>
                                                <form method="POST" action="controller/delete.php" 
                                                    onclick="return confirm('Tem certeza que deseja excluir ?');">
                                                    <input type="hidden" name="id" value="<?php echo $dados['id_divida'] ?>">
                                                    <button class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>
</html>
