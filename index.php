<? require './inc/session_start.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Down</title>
</head>

<body>
    <section class="h-100">

        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <a href="index.php"><img src="./images/Logo-2.jpg" alt="logo" width="100"></a>
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form method="POST" class="" action="../db/login-controller.php" autocomplete="off">

                                <div class="mb-3">

                                    <label class="mb-2 text-muted" for="email">CURP</label>
                                    <input id="curp" type="text" class="form-control" name="curp" pattern="[A-Z0-9 ]{18}" value="" required autofocus>
                                </div>

                                <div class=" d-flex align-items-center">

                                    <button type="submit" name="btnLogin" class="button is-warning ms-auto">
                                        Login
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
    <!-- 
    <audio autoplay loop>
        <source src="./audios/shrek-somebodycena.mp3" type="audio/mp3">
    </audio> -->

</body>

</html>