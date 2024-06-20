<?php include 'includes/header.php'; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - AppConsulta</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/transition-style">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center home_container">
        <div class="row">
            <div class="col-md-12">
                <h1>Bienvenido a AppConsulta</h1>
                <div transition-style="in:wipe:up">
                    <img src=" img/logo.png" alt="logo" class="img-fluid mx-auto d-block" style="max-width: 340px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>¿Qué es AppConsulta?</h2>
                <p>AppConsulta es una plataforma diseñada para ayudar a las personas a identificar programas de asistencia y beneficios económicos disponibles tanto del estado como de entidades gubernamentales y, próximamente, de empresas privadas. Nuestra misión es simplificar el proceso de búsqueda de ayudas para aquellos que más lo necesitan.</p>
                <p>Con solo ingresar tus datos, podrás saber a qué programas puedes acceder, permitiéndote obtener el apoyo necesario de manera rápida y eficiente. Navega por nuestra aplicación para descubrir las oportunidades de ayuda que están a tu alcance y cómo puedes beneficiarte de ellas. ¡Bienvenido a un mundo de posibilidades con AppConsulta!</p>
                <p><a href="/app_consulta_php_mvc/register/register">regístrate</a> o <a href="/app_consulta_php_mvc/login/authenticate">inicia sesión</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>