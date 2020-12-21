<?php
    session_start();
?>
<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>


<!doctype html>
<html>
<head>
    <meta charset='utf-8'>

    <title>Portaria System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        html, body {
            height:100%;
            width:100%;
        }
        body {
            display:flex;
            align-items:center;
            background-color: #ccc;
        }
    </style>
</head>

<body>
<main class="container">
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card-group mb-0">
            <div class="card p-1">
                <div class="card-block">
                    <h1>Portaria System</h1>
                    <p class="text-muted">Entre com a sua conta</p>
                    <form method="post" action="valida.php">
                        <div class="input-group mb-3">
                              <span class="input-group-addon"><i class="fa fa-user"></i>
                              </span>
                            <input type="email" name="email" placeholder="Email" class="form-control" required autofocus>
                        </div>
                        <div class="input-group mb-4">
                              <span class="input-group-addon"><i class="fa fa-lock"></i>
                              </span>
                            <input type="password" name="senha" placeholder="Senha" class="form-control">
                        </div>
                        <div class="row">

                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-primary px-4">Acessar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>
</html>
			<p>
            <?php if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }?>
			</p>
			<p>
            <?php 
            if(isset($_SESSION['logindeslogado'])){
                echo $_SESSION['logindeslogado'];
                unset($_SESSION['logindeslogado']);
            }
            ?>
			
			
