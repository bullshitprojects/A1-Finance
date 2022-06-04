<?php
$usuario = $_SESSION['usuario'];
$transacion = new TransaccionController();
$ltransacion = $transacion->TransaccionesPorUsuario($usuario->getIdUsuario());

foreach ($ltransacion as $t) {
    $fecha = $t['fecha'];
    $descripcion = $t['descripcion'];
    $no_cuenta = $t['no_cuenta'];
    $nombre = $t['nombre'];
    $id_tipo_transaccion = $t['id_tipo_transaccion'];
    $monto = "$" . number_format(floatval($t['monto']), 2);

    echo "<div class=\"mt-5 mb-5\">";
    echo "  <p class=\"transaction-date\">$fecha</p>";

    echo "  <div class=\"transaction-entry mt-4\">";
    echo "      <div class=\"transaction-entry__info\">";
    echo "          <div class=\"transaction-icon-container\">";
    echo "              <div class=\"transaction-entry__entry-icon\"></div>";
    echo "          </div>";
    echo "      <div class=\"transaction-entry__details\">";
    echo "          <h4>$descripcion</h4>";
    echo "          <p class=\"transaction-entry__date\">$no_cuenta</p>";
    echo "      </div>";
    echo "  </div>";

    echo "  <div class=\"transaction-entry__category\">";
    echo "      <div class=\"transaction-entry__category-container\">";
    if ($id_tipo_transaccion == 1) {
        echo "          <div class=\"transaction-entry__category-icon-entry\"></div>";
        echo "          <div class=\"transaction-entry__category-text-entry\">$nombre</div>";
    } else {
        echo "          <div class=\"transaction-entry__category-icon-egress\"></div>";
        echo "          <div class=\"transaction-entry__category-text-egress\">$nombre</div>";
    }
    echo "      </div>";
    echo "  </div>";

    echo "  <div class=\"transaction-entry__transaction-details\">";
    echo "      <div class=\"transaction-entry__transaction-icon-container\">";
    if ($id_tipo_transaccion == 1) {
        echo "          <div class=\"transaction-entry__transaction-icon-income\"></div>";
    } else {
        echo "          <div class=\"transaction-entry__transaction-icon-outcome\"></div>";
    }
    echo "      </div>";
    echo "      <div class=\"transaction-entry__transaction-amount\">";
    echo "          <p>$monto</p>";
    echo "      </div>";
    echo "  </div>";
    echo "</div>";
}
