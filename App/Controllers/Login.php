<?php

if (isset($_POST['login'])) {
   // verificar o login aqui
   if ('logar com sucesso') {
      $_SESSION['user'] = ['dados do user'];
      header('location: ./');
   } else {
      // defina mensagem de erro
      $_SESSION['print_r'] = '<div class="alert alert-danger">login e/ou senha incorretos, chefe!</div>';
   }
}
include 'App/Views/Login.php';
exit;
