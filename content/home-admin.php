<? require './inc/session_start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/home-user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="tabs is-large tabs is-centered">
        <ul>
            <li class="is-active"><a class="atitless">Registrar Alumno</a></li>
            <li> <a href="./view-alumnos.php" class="atitless">Visualizar Alumnos</a></li>
            <li> <a href="./create-report.php" class="atitless">Crear Reporte</a></li>
        </ul>
    </div>

    <?php include '../inc/navbar.php'; ?>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <!-- <div class="text-center my-5">
                        <a href="#"><img src="../images/Logo-2.jpg" alt="logo" width="100"></a>
                    </div> -->
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Registro alumno</h1>
                            <form class=" " action="../db/register_controller.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <input type="hidden" name="module_user" value="register">

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Nombre</label>
                                    <input id="name" type="text" class="form-control" name="name" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,60}" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        El Nombre es requerido
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="curp">CURP</label>
                                    <input id="curp" type="curp" class="form-control" name="curp" pattern="[A-Z0-9 ]{18}" value="" required>
                                    <div class="invalid-feedback">
                                        La CURP es requerida
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="phone">Telefono</label>
                                    <input id="phone" type="phone" class="form-control" name="phone" pattern="[0-9 ]{10}" maxlength="10" required>
                                    <div class="invalid-feedback">
                                        El telefono es requerido
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="adress">Dirección</label>
                                    <input id="address" type="address" class="form-control" name="address" pattern="[a-zA-Z0-9 ]{10-80}" required>
                                    <div class="invalid-feedback">
                                        La Dirección es requerida
                                    </div>
                                </div>
                                <div class="align-items-center d-flex">
                                    <button type="submit" name="btnRegister" class="button is-warning ms-auto">
                                        Registrar
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2024 &mdash; A.L.A.D A.C.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="columnas">
        <div class="card" style="width: 18rem;">
            <img src="../images/suma.jpg" class="card-img-top" alt="imagen de suma">
            <div class="card-body">
                <h5 class="card-title">Ejercicio de Sumas</h5>
                <p class="card-text">El siguiente ejercicio te permitira practicar tu razonamiento matematico con
                    operaciones de suma.</p>
                <a href="./suma.php" class="btn btn-primary">Vamos a intentarlo</a>
            </div>
        </div>
        <div class="space"></div>

        <div class="card" style="width: 18rem;">
            <img src="../images/operaciones.jpg" class="card-img-top" alt="imagen de suma">
            <div class="card-body">
                <h5 class="card-title">Ejercicio de Operaciones </h5>
                <p class="card-text">El siguiente ejercicio te permitira practicar tu razonamiento matematico con
                    operaciones de matemáticas.</p>
                <a href="./matematicas.php" class="btn btn-primary">Vamos a intentarlo</a>
            </div>
        </div>

    </div>

    <div class="space-bottom"></div> -->


</body>

</html>