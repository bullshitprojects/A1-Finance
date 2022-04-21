<div class="account-container">
    <div class="account-container__container">
        <h3>Cuentas</h3>
        <a href="" data-bs-toggle="modal" data-bs-target="#modalAccount">A&ntilde;adir Cuenta</a>
        <?php
        include 'view/modal-account.view.php';
        ?>
    </div>
    <div class="account-container__accounts">
        <?php
        include 'card.view.php'
        ?>
    </div>
</div>