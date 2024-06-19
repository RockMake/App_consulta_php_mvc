<?php include 'includes/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<div class="container">
    <div class="card">
        <h1 class="card-header">Registro</h1>
        <form method="post" action="/app_consulta_php_mvc/register/register" onsubmit="return validarRegistro()">
            <?php if (isset($status_message)) echo $status_message; ?>
            <!-- Tipo de identificación del usuario -->
            <div class="form-group">
                <select class="form-control" name="tipo_identificacion" title="Tipo de identificación">
                    <option value="">Tipo de identificación</option>
                    <option value="cc">Cédula de Ciudadanía</option>
                    <option value="ti">Tarjeta de Identidad</option>
                    <option value="rc">Registro Civil</option>
                    <option value="ps">Pasaporte</option>
                </select>
            </div>
            <!-- Número de identificación del usuario -->
            <div class="form-group">
                <input type="text" class="form-control" name="numero_identificacion" placeholder="Número de identificación">
            </div>
            <!-- Correo del usuario -->
            <div class="form-group">
                <input type="email" class="form-control" name="correo_electronico" placeholder="Correo Electrónico">
            </div>
            <!-- Nombres del usuario -->
            <div class="form-group">
                <input type="text" class="form-control" name="nombres" placeholder="Nombres">
            </div>
            <!-- Apellidos del usuario -->
            <div class="form-group">
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
            </div>
            <!-- Sexo del usuario -->
            <div class="form-group">
                <select class="form-control" name="sexo" title="Sexo">
                    <option value="">Sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </div>
            <!-- Fecha de nacimiento -->
            <div class="form-group">
                <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
            </div>
            <!-- Departamento de residencia -->
            <div class="form-group">
                <select class="form-control" name="departamento_residencia" title="Departamento de residencia">
                    <option value="">Departamento de residencia</option>
                    <!-- Agrega todas las opciones de departamentos -->
                </select>
            </div>
            <!-- Municipio de residencia -->
            <div class="form-group">
                <input type="text" class="form-control" name="municipio_residencia" placeholder="Municipio de residencia">
            </div>
            <!-- Dirección de residencia -->
            <div class="form-group">
                <input type="text" class="form-control" name="direccion_residencia" placeholder="Dirección de residencia">
            </div>
            <!-- Teléfono celular -->
            <div class="form-group">
                <input type="tel" class="form-control" name="telefono_celular" placeholder="Teléfono celular">
            </div>
            <!-- Contraseña -->
            <div class="form-group">
                <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
            </div>
            <!-- Grupo Étnico -->
            <div class="form-group">
                <select class="form-control" name="grupo_etnico" title="Grupo Étnico">
                    <option value="">Grupo Étnico</option>
                    <option value="narp">Comunidades Negras, Afrocolombianas, Raizales y Palenqueras (NARP)</option>
                    <option value="pueblo_indigena">Pueblo Indígena</option>
                    <option value="pueblo_rrom_gitano">Pueblo Rrom o Gitano</option>
                    <option value="ninguno">Ninguno</option>
                </select>
            </div>
            <!-- Grupo Sisben IV -->
            <div class="form-group">
                <select class="form-control" name="grupo_sisben" title="Grupo Sisben IV">
                    <option value="">Grupo Sisben IV</option>
                    <!-- Agrega todas las opciones de grupo Sisben -->
                </select>
            </div>
            <!-- Discapacidad -->
            <div class="form-group">
                <select class="form-control" name="discapacidad" id="discapacidad" onchange="mostrarTipoDiscapacidad()" title="¿Tiene alguna discapacidad?">
                    <option value="">¿Tiene alguna discapacidad?</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <!-- Tipo de Discapacidad -->
            <div class="form-group" id="tipoDiscapacidad">
                <input type="text" class="form-control" name="tipo_discapacidad" placeholder="Tipo de discapacidad">
            </div>
            <!-- Estado Civil -->
            <div class="form-group">
                <select class="form-control" name="estado_civil" title="Estado Civil">
                    <option value="">Estado Civil</option>
                    <option value="soltero">Soltero</option>
                    <option value="casado">Casado</option>
                    <option value="divorciado">Divorciado</option>
                    <option value="viudo">Viudo</option>
                </select>
            </div>
            <!-- Víctima del conflicto armado -->
            <div class="form-group">
                <select class="form-control" name="victima_conflicto_armado" title="¿Es usted víctima del conflicto armado?">
                    <option value="">¿Es usted víctima del conflicto armado?</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <p class="mt-3">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>.</p>
        </form>
    </div>
</div>

<script src="/js/validacion_registro.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php include '../includes/footer.php'; ?>