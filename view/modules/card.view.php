<?php
$usuario = $_SESSION['usuario'];
$cuenta = new CuentaController();
$lcuenta = $cuenta->ListaCuenta($usuario->getIdUsuario());
$i = 0;
foreach ($lcuenta as $c) {
    switch ($i) {
        case 0:
            $color = "first";
            break;
        case 1:
            $color = "second";
            break;
        case 2:
            $color = "third";
            break;
    }
    $balance = "$" . number_format(floatval($c['balance']), 2);
    $nombre = strtoupper($c['no_cuenta']);
    echo "<div class=\"card-account $color\">";
    echo "<div class=\"card-account__top-container\">";
    echo "<p class=\"card-account__amount\">$balance</p>";
    echo " <div class=\"card-account__menu-icon\"></div>";
    echo "</div>";
    echo "<div class=\"card-account__bottom-container\">";
    echo " <div class=\"card-account__account-icon-cash\"></div>";
    echo "<div class=\"card-account__account-type\">$nombre</div>";
    echo "</div>";
    echo "</div>";
    $i += 1;
}
