<!-- Ex5 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
    <script src="../view/bootstrap/js/bootstrap.min.js"></script>
    <!-- Delete confirm modal script -->
    <script src="../view/scripts/confirm-dialog.js"></script>
    <!-- jquery -->
    <script src="../view/jquery/jquery-3.6.1.min.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../view/fontello/css/fontello.css">
    <!-- Estils propis -->
    <link rel="stylesheet" href="../view/styles.css">
    <!-- Establir com a títol de la pàgina el nom de la pel·lícula  -->
    <title><?php echo $article['title'] ?></title>
    <link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
</head>

<body>
<?php require_once 'navbar.php' ?>
    <!-- Background image -->
    <header class="text-center bg-image" style="
      background-image: url('../uploads/<?php echo $article['image_path'] . "?" . $filetime ?>?');
      background-position: center;
      background-size: cover;">
    </header>
    <main class="container mt-5">
        <div class="row justify-content-center">

            <!-- Content -->
            <section class="col-md-7 col-12 order-md-2 order-1 mt-md-0 mt-5">
                <h2 class="mb-2">
                    Eliminar compte
                </h2>

                <hr class="mb-4">
                <p>
                    <strong>Atenció!</strong> Aquesta acció no es pot desfer. Si us plau, confirma que vols eliminar el teu compte.
                </p>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="eliminar" class="form-label">Estàs segut que vols eliminar el compte???</label>
                    <input type="submit" class="btn btn-danger" id="eliminar" name="eliminar" value="Eliminar compte">
            </section>
        </div>
    </main>

    <!-- Delete confirm modal -->
    <?php include_once '../view/confirm-modal.view.php' ?>

    <!-- Footer -->
    <?php include_once '../view/footer.view.php' ?>
</body>

</html>