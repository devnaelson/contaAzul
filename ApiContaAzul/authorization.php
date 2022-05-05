<?php
session_start();

$requireAutoload = __DIR__ . '/vendor/autoload.php';
require $requireAutoload;

use ContaAzul\ContaAzul;
use ContaAzul\Helpers\Helpers;

//VARIÁVEIS NECESSÁRIAS PARA INICIALIZAÇÃ0
$client_id = "uIcI0OKNEE3EP0EHsEFl7GTMtiKQlwoW";
$client_secret = "9FBNKRcdFv450i9NVKBBpeE6C4NwEkzS";
$redirect_uri = "https://0604-2804-d59-ff0f-800-e370-9ee3-8983-1cf4.sa.ngrok.io/conta-azul/Conta-Azul-Api/authorization.php"; // pega a url atual para negociar os pedidos da URL de redirecionamento.
$scope = "customers";
$state = Helpers::generateRandomString(16);

//INSTANCIANDO A CLASSE
$apiContaazul = new ContaAzul($client_id, $client_secret, $redirect_uri, $scope, $state);

if (isset($_REQUEST['code'])) {
  $getToken = $apiContaazul->requestToken($_REQUEST['code']);
  $_SESSION['session_token'] = $getToken;
  echo "<pre>";
  print_r($getToken);
  echo "</pre>";
}

if (isset($_REQUEST['refresh'])) {
  $getToken = $apiContaazul->requestRefreshedToken("9X3vugGUxSTkXloAQPGE8sJrON9JV27d");
  print_r($getToken);
}

// https://api.contaazul.com/auth/authorize?redirect_uri=https://0604-2804-d59-ff0f-800-e370-9ee3-8983-1cf4.sa.ngrok.io/conta-azul/Conta-Azul-Api/authorization.php&client_id=uIcI0OKNEE3EP0EHsEFl7GTMtiKQlwoW&scope=sales&state=7uwRQqKrYEwjrl7
