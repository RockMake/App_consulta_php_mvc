<?php include 'includes/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="card-header">Registro</h1>
            <form method="post" action="/app_consulta_php_mvc/register/register" onsubmit="return validarRegistro()">
                <?php if (isset($status_message)) echo $status_message; ?>
                <!-- Tipo de identificación del usuario -->
                <div class="form-group">
                    <select class="form-control" name="tipo_identificacion" title="Tipo de identificacion">
                        <option value="">Tipo de identificacion</option>
                        <option value="cc">Cedula de Ciudadania</option>
                        <option value="ti">Tarjeta de identidad</option>
                        <option value="rc">Registro civil</option>
                        <option calue="ps">Pasaporte</option>

                    </select>
                </div>
                <!-- Numero de identificacion del usuario-->
                <div class="form-group">
                    <input type="text" class="form-control" name="numero_identificacion" placeholder="Número de identificación">
                </div>
                <!-- Correro del usuario -->
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
                <!-- sexo del usuario -->
                <div class="form-group">
                    <select class="form-control" id="sexo" name="sexo" onchange="mostrarMadreCabezaHogar()" title="Sexo">
                        <option value="">Sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
                <!-- Madre cabeza de hogar -->
                <div class="form-group" id="madreCabezaHogar" style="display: none;">
                    <select class="form-control" name="madre_cabeza_hogar" id="madre_cabeza_hogar" onchange="mostrarEdadHijos()" title="¿Eres madre cabeza de hogar?">
                        <option value="">¿Eres madre cabeza de hogar?</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <!-- Rango de edad de los hijos -->
                <div class="form-group" id="edadHijos" style="display: none;">
                    <select class="form-control" name="rango_edad_hijos" title="¿Qué edad tienen tus hijos?">
                        <option value="">¿Qué edad tienen tus hijos?</option>
                        <option value="0-6">0 - 6 años</option>
                        <option value="7-10">7 - 10 años</option>
                        <option value="11-15">11 - 15 años</option>
                        <option value="16-17">16 - 17 años</option>
                    </select>
                </div>
                <!-- Fecha de nacimiento-->
                <div class="form-group">
                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                </div>
                <!-- Departamento de residencia-->
                <div class="form-group">
                    <select class="form-control" name="departamento_residencia" title="Departamento de residencia">
                        <option value="">Departamento de residencia</option>
                        <option value="amazonas">Amazonas</option>
                        <option value="antioquia">Antioquia</option>
                        <option value="arauca">Arauca</option>
                        <option value="atlantico">Atlántico</option>
                        <option value="bolivar">Bolívar</option>
                        <option value="boyaca">Boyacá</option>
                        <option value="caldas">Caldas</option>
                        <option value="caqueta">Caquetá</option>
                        <option value="casanare">Casanare</option>
                        <option value="cauca">Cauca</option>
                        <option value="cesar">Cesar</option>
                        <option value="choco">Chocó</option>
                        <option value="cordoba">Córdoba</option>
                        <option value="cundinamarca">Cundinamarca</option>
                        <option value="guainia">Guainía</option>
                        <option value="guaviare">Guaviare</option>
                        <option value="huila">Huila</option>
                        <option value="laguajira">La Guajira</option>
                        <option value="magdalena">Magdalena</option>
                        <option value="meta">Meta</option>
                        <option value="narino">Nariño</option>
                        <option value="nortedesantander">Norte de Santander</option>
                        <option value="putumayo">Putumayo</option>
                        <option value="quindio">Quindío</option>
                        <option value="risaralda">Risaralda</option>
                        <option value="sanandresyprovidencia">San Andrés y Providencia</option>
                        <option value="santander">Santander</option>
                        <option value="sucre">Sucre</option>
                        <option value="tolima">Tolima</option>
                        <option value="valledelcauca">Valle del Cauca</option>
                        <option value="vaupes">Vaupés</option>
                        <option value="vichada">Vichada</option>
                    </select>
                    <!-- Municipio de Residencia -->
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="municipio_residencia" placeholder="Municipio de residencia">
                </div>
                <!-- Dirrecion_Residencia -->
                <div class="form-group">
                    <input type="text" class="form-control" name="direccion_residencia" placeholder="Dirección de residencia">
                </div>
                <!-- Telefono celular -->
                <div class="form-group">
                    <input type="tel" class="form-control" name="telefono_celular" placeholder="Teléfono celular">
                </div>
                <!-- Contraseña -->
                <div class="form-group">
                    <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                </div>
                <!-- Grupo Etnico -->
                <div class="form-group ">
                    <select class="form-control" name="grupo_etnico" title="Grupo Etnico">
                        <option value="">Grupo Etnico</option>
                        <option value="narp">Comunidades Negras, Afrocolombianas, Raizales y Palenqueras (NARP)</option>
                        <option value="pueblo_indigena">Pueblo Indigena</option>
                        <option value="pueblo_rrom_gitano">Pueblo Rrom o Gitano</option>
                        <option value="ninguno">Ninguno</option>
                    </select>
                </div>
                <!-- Grupo Sisben -->
                <div class="form-group">
                    <select class="form-control" name="grupo_sisben" title="Grupo Sisben IV">
                        <option value="">Grupo Sisben IV</option>
                        <option value="A1">GRUPO A1</option>
                        <option value="A2">GRUPO A2</option>
                        <option value="A3">GRUPO A3</option>
                        <option value="A4">GRUPO A4</option>
                        <option value="A5">GRUPO A5</option>
                        <option value="B1">GRUPO B1</option>
                        <option value="B2">GRUPO B2</option>
                        <option value="B3">GRUPO B3</option>
                        <option value="B4">GRUPO B4</option>
                        <option value="B5">GRUPO B5</option>
                        <option value="B6">GRUPO B6</option>
                        <option value="B7">GRUPO B7</option>
                        <option value="C1">GRUPO C1</option>
                        <option value="C2">GRUPO C2</option>
                        <option value="C3">GRUPO C3</option>
                        <option value="C4">GRUPO C4</option>
                        <option value="C5">GRUPO C5</option>
                        <option value="C6">GRUPO C6</option>
                        <option value="C7">GRUPO C7</option>
                        <option value="C8">GRUPO C8</option>
                        <option value="C9">GRUPO C9</option>
                        <option value="C10">GRUPO C10</option>
                        <option value="C11">GRUPO C11</option>
                        <option value="C12">GRUPO C12</option>
                        <option value="C13">GRUPO C13</option>
                        <option value="C14">GRUPO C14</option>
                        <option value="C15">GRUPO C15</option>
                        <option value="C16">GRUPO C16</option>
                        <option value="C17">GRUPO C17</option>
                        <option value="C18">GRUPO C18</option>
                        <option value="otro">Otro</option>
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
                <div class="form-group" id="tipoDiscapacidad" style="display: none;">
                    <select class="form-control" name="tipo_discapacidad" title="Tipo de discapacidad">
                        <option value="">Tipo de discapacidad</option>
                        <option value="fisica">Discapacidad Física</option>
                        <option value="visual">Discapacidad Visual</option>
                        <option value="auditiva">Discapacidad Auditiva</option>
                        <option value="intelectual">Discapacidad Intelectual</option>
                        <option value="psicosocial">Discapacidad Psicosocial</option>
                        <option value="cognitiva">Discapacidad Cognitiva</option>
                        <option value="desarollo">Discapacidad del Desarrollo</option>
                        <option value="multiple">Discapacidad Multiple</option>
                        <option value="otra">Otra </option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="estado_civil" title="Estado Civil">
                        <option value="">Estado Civil</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>

                <!-- víctima del conflicto armado -->
                <div class="form-group">
                    <select class="form-control" name="victima_conflicto_armado" title="Select an option">
                        <option value="">¿Es usted víctima del conflicto armado?</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
                <p class="mt-3">¿ya tienes una cuenta ? <a href="/app_consulta_php_mvc/login/authenticate">Inicia sesion</a>.</p>
            </form>
        </div>
    </div>
    <script src="/app_consulta_php_mvc/js/validacion_registro.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>