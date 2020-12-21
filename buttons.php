<h3>Portaria System</h3>
<hr />

<?php if ($db) : ?>

<div class="row">
    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="cadastro_pessoas.php" class="btn btn-danger btn-sm">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-plus fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Novo Cadastro</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="mostra_todos.php" class="btn btn-warning btn-sm">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-user fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Cadastros</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="pesquisa.php" class="btn btn-warning btn-sm">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-search fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Pesquisar</p>
                </div>
            </div>
        </a>
    </div>

</div>
<hr>
<div class="row">

    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="entrada.php" class="btn btn-success btn-sm">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-arrow-down fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Entrada</p>
                </div>
            </div>
        </a>
    </div>


    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="s_sair.php" class="btn btn-info btn-sm">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-arrow-up fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Saída</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="r_entrada.php" class="btn btn-warning btn-sm">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-refresh fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Entrada e Saída</p>
                </div>
            </div>
        </a>
    </div>

</div>
</hr>

<hr>
<div class="row">
    <div class="col-xs-6 col-sm-2 col-md-2">
        <a href="gerarelxls.php" class="btn btn-sm btn-primary">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-file-excel-o fa-3x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Relatório Dia</p>
                </div>
            </div>
        </a>
    </div>
    </hr>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
        </div>

    <?php endif; ?>
