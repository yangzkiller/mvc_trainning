<?php

namespace App\Http;

class Response {

    /**
     * Código do status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do response
     * $var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do response
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por iniciar a classe e definir os valores
     * @param integer
     * @param mixed
     * @param string
     */
    public function __construct($httpCode, $content, $contentType = 'text/html') {
        $this->httpCode = $httpCode;
        $this->content = $content;  
        $this->setContentType($contentType);
    }

    /**
     * Método responsável por alterar o content type do response
     * @param string
     */
    public function setContentType($contentType) {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar umregistro no cabeçalho de response
     * @param
     * @param
     */
    public function addHeader($key, $value) {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsavél por enviar os headers para o navegador
     */
    private function sendHeaders() {
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR HEADERS
        foreach($this->headers as $key=>$value) {
            header($key.': '.$value);
        }
    }

    /**
     * Método responsável por enviar a resposta para o usuário
     */
    public function sendResponse() {
        //ENVIA OS HEADERS
        $this->sendHeaders();

        //IMPRIME O CONTEÚDO
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}