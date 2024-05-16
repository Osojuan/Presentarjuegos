<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Register-Down</title>
</head>

<body>

    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <a href="#"><img src="../images/Logo-2.jpg" alt="logo" width="100"></a>
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Registro alumno</h1>
                            <form class=" " action="../db/conexion_db.php" method="POST" autocomplete="off" enctype="multipart/form-data">
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
</body>

</html>