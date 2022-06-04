<?php
$usuario = $_SESSION['usuario'];
$transaccionesPorTipo = new TransaccionController();
$data = $transaccionesPorTipo->TransaccionesPorTipo($usuario->getIdUsuario());
foreach ($data as $d) {
    if ($d['id'] == 1) {
        $ingreso = $d['total'];
    } else {
        $egreso = $d['total'];
    }
}
?>

<div class="transactions mt-5">
    <div class="transactions__header">
        <h3>Transacciones</h3>
        <div class="transactions__transaction-info">
            <div class="transactions__transaction-type">
                <div class="transaction-type__icon income"></div>
                <p>Ingresos</p>
                <p id="income-value" class="income-value">$ <?php if (isset($ingreso)) {
                                                                echo number_format($ingreso, 2);
                                                            } else {
                                                                echo number_format(0, 2);
                                                            } ?></p>
            </div>
            <div class="transactions__transaction-type">
                <div class="transaction-type__icon outcome"></div>
                <p>Egresos</p>
                <p id="outcome-value" class="outcome-value">$ <?php if (isset($egreso)) {
                                                                    echo number_format($egreso, 2);
                                                                } else {
                                                                    echo number_format(0, 2);
                                                                } ?></p>
            </div>
        </div>
    </div>

    <div class="transactions__transaction">
        <?php
        include 'transaction-entry.view.php';
        ?>
    </div>
</div>