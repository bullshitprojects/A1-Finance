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
        if (isset($_GET['path'])) {
            $link = $_GET['path'];
        } else {
            $link = 'login';
        }

        $response = Pages::pageRoute($link);

        include $response;
    }
}
