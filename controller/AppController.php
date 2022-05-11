<?php
include 'UsuarioController.php';
class AppController
{
    public function page()
    {
        include 'view/main.php';
    }

    public function linkPages()
    {
        if (isset($_GET['page'])) {
            $link = $_GET['page'];
        } else {
            $link = 'login';
        }

        $response = Pages::pageRoute($link);

        include $response;
    }
}
