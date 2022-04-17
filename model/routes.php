<?php
class Pages
{
    public static function pageRoute($link)
    {
        switch ($link) {
            case 'login' || 'logout' || 'profile' || 'settings':
                $module = 'views/' . $link . '.php';
                break;
            case 'index' || 'home':
                $module = 'views/login.php';
                break;
            default:
                $module = 'views/login.php';
                break;
        }

        return $module;
    }
}
