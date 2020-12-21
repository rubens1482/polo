<?php
session_start();
// define o timezone do sistema
date_default_timezone_set('America/Sao_Paulo');

require 'App/Helpers/Functions.php';

//require 'App/Core/Router.php';

// verificar se o user está logado:
if (!isset($_SESSION['user'])) {
   header('location: '.base_url('login'));
}
?>