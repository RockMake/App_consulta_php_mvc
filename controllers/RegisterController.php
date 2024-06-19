<?php
class RegisterController
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function index()
    {
        include 'views/register.php';
    }

    public function register()
    {
        include_once 'db/config.php';
        $status_message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                $_POST['tipo_identificacion'],
                $_POST['numero_identificacion'],
                $_POST['correo_electronico'],
                $_POST['nombres'],
                $_POST['apellidos'],
                $_POST['sexo'],
                $_POST['fecha_nacimiento'],
                $_POST['departamento_residencia'],
                $_POST['municipio_residencia'],
                $_POST['direccion_residencia'],
                $_POST['telefono_celular'],
                password_hash($_POST['contrasena'], PASSWORD_BCRYPT),
                $_POST['grupo_etnico'],
                $_POST['grupo_sisben'],
                $_POST['discapacidad'],
                $_POST['tipo_discapacidad'],
                $_POST['estado_civil'],
                $_POST['victima_conflicto_armado']
            ];

            if ($this->userModel->register($data)) {
                $status_message = '<div class="alert alert-success" role="alert">Registro exitoso</div>';
            } else {
                $status_message = '<div class="alert alert-danger" role="alert">Error en el registro</div>';
            }
        }

        include 'views/register.php';
    }
}
