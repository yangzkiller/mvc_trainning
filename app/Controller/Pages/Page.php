<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page {

    /**
     * Método responsável por renderizar o topo da página
     * @return string
     */
    private static function get_header() {
        return View::render('pages/header');
    }

    /**
     * Método responsável por renderizar o rodapé da página
     * @return string
     */
    private static function get_footer() {
        return View::render('pages/footer');
    }

    /**
     * Método responsável por retornar o conteúdo (view) da nossa página genérica
     * @return string
     */
    public static function getPage($title,$content) {
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::get_header(),
            'content' => $content,
            'footer' => self::get_footer()
        ]);
    }
}