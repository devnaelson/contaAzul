<?php

$requireAutoload= __DIR__. '/vendor/autoload.php';
require $requireAutoload;

use ContaAzul\ContaAzul;
use ContaAzul\Helpers\Helpers;

if(isset($_REQUEST['code'])){
    $getToken=$apiContaazul->requestToken($_REQUEST['code']);
  }

// if (isset($_REQUEST['code'])) {
//     $req_dump = print_r( $_REQUEST, true );
//     $fp = file_put_contents('request.log', $req_dump);
// }
