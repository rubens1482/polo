
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    .panel {
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        margin-bottom: 30px;
        margin-top:10px;
    }

    .panel.panel-default {
        border: 1px solid #d4d4d4;
        -webkit-box-shadow: 0 2px 1px -1px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 2px 1px -1px rgba(0, 0, 0, 0.1);
        box-shadow: 0 2px 1px -1px rgba(0, 0, 0, 0.1);
    }

    .btn-icon {
        color: #484848;
    }
</style>
<div class="container">
    <div class="row">
<?php
foreach($clientes as $cliente):
        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class='card-title'>$cliente->nome</h4><small>Matrícula:$cliente->matricula<br>Tipo:$cliente->tipo<br>Empresa:$cliente->empresa</small>
                    <fieldset class='bg-info text-white m-1 p-1'>
                        Veículo:$cliente->veiculo Placa:$cliente->placa<br>Cidade:$cliente->cidade Uf:$cliente->uf
                    </fieldset>
                    <p class='card-text'>Entrada:$cliente->dataentrada  Entrada:$cliente->horaentrada<br>Saída:$cliente->horasaida</p>
                </div>
                <div class="panel-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-link btn-icon"><i class="fa fa-map-marker"></i></button>
                        <button type="button" class="btn btn-link btn-icon"><i class="fa fa-users"></i></button>
                        <button type="button" class="btn btn-link btn-icon"><i class="fa fa-camera"></i></button>
                        <button type="button" class="btn btn-link btn-icon"><i class="fa fa-video-camera"></i></button>
                    </div>

                    <div class="pull-right">
                       <a href='s_sair_libera.php?id=$cliente->id' class='btn btn-danger pull-right'>LIBERAR SAIDA</a>
                    </div>
                </div>
            </div>
        </div>
?>
<?php endforeach;?>
    </div>
    </div>
    </div>
</div>