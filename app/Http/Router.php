<?php

namespace App\Http;

class Router {

    /**
     * URL completa do projeto (raiz)
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Indice de rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de Request
     * @var Request
     */
    private $request;

    /**
     * Método responsável por iniciar a classe
     * @param string 
     */
    public function __construct($url) {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }
    
    /**
     * Método responsável por definir o prefixo das rotas
     */
    private function setPrefix() {
        //INFORMAÇÕES DA URL ATUAL
        $parseUrl = parse_url($this->url);
        
        //DEFINE O PREFIXO
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * ,étodo responsável por adicionar uma rota na clase
     * @param string
     * @param string
     * @param array
     */
    private function addRoute($method, $route, $params = []) {
        echo"<pre>";
        print_r($method);
        echo "<?pre>";
        echo"<pre>";
        print_r($route);
        echo "<?pre>";
        echo"<pre>";
        print_r($params);
        echo "<?pre>";
    }

    /**
    * Método responsável por definir uma rota de GET
    * @param string
    * @param array
    */
    public function get($route, $params = []) {
        return $this->addRoute('GET', $route, $params);

    }
}