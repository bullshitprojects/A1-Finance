<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'imports.php';
    ?>
    <title>Perfil</title>
</head>

<body>
    <div class="container-fluid main">
        <div class="col-8 border-both main-content px-5 py-5 d-flex justify-content-center">
            <h3 style="color:white">Perfil</h3>
            <div class="mt-5" style="width: 700px;">
                <form class="row g-3">
                    <div class="col-12">
                        <div class="profile-pic-div">
                            <img src="web/images/perfil.png" id="photo">
                            <input type="file" id="file">X
                            <label for="file" id="uploadBtn">Elegir foto</label>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br>
                    <div class="col-md-6">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">DUI</label>
                        <input type="text" class="form-control" id="inputLastName">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input type="text" class="form-control" id="inputDUI">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="inputPhoneNumber">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail">
                    </div>
                   
                    <div class="col-12">
                        <br>
                        <button type="submit" class="submit">Actualizar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>