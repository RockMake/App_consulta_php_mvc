<?php include 'includes/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<div class="container">
    <div class="card">
        <h1 class="card-header">Iniciar Sesión</h1>
        <form method="post" action="/app_consulta_php_mvc/login/authenticate">
            <?php if (isset($status_message)) echo $status_message; ?>
            <div class="form-group">
                <input type="email" class="form-control" name="correo_electronico" placeholder="Correo Electrónico" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            <br>
            <p class="sm-3">¿No tienes una cuenta? <a href="/app_consulta_php_mvc/views/register.php">Regístrate aquí</a>.</p>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php include '../includes/footer.php'; ?>