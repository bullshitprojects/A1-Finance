<div class="transactions mt-5">
    <div class="transactions__header">
        <h3>Transacciones</h3>
        <div class="transactions__transaction-info">
            <div class="transactions__transaction-type">
                <div class="transaction-type__icon income"></div>
                <p>Ingresos</p>
                <p id="income-value" class="income-value">$52,434.23</p>
            </div>
            <div class="transactions__transaction-type">
                <div class="transaction-type__icon outcome"></div>
                <p>Egresos</p>
                <p id="outcome-value" class="outcome-value">$2500.43</p>
            </div>
        </div>
    </div>

    <div class="transactions__transaction">
        <?php
        include 'transaction-entry.view.php';
        ?>
    </div>
</div>