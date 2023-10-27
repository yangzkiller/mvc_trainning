<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('URL', 'http://localhost/mvc_trainning');

//DEFINE O  VALOR PADRÃO DAS VÁRIAVEIS
View::init([
        'URL' => URL
]);

//INICIA O ROUTER
$obRouter = new Router(URL);

//INNCLUI AS ROTAS DE PÁGINAS
include __DIR__.'/routes/pages.php';

//IMPRIME O RESPONSE DA ROTA
$obRouter->run()
        ->sendResponse();