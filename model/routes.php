<?php
class Pages
{
    public static function pageRoute($link)
    {
        switch ($link) {
            case 'login' || 'logout' || 'profile' || 'settings':
                $module = 'view/' . $link . '.php';
                break;
            case 'index' || 'home':
                $module = 'view/home.php';
                break;
            default:
                $module = 'view/login.php';
                break;
        }

        return $module;
    }
}
