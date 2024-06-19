<?php
class LoginController
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function index()
    {
        include 'views/login.php';
    }

    public function authenticate()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo_electronico = $_POST['correo_electronico'];
            $contrasena = $_POST['contrasena'];

            // Verificar credenciales usando el modelo User
            $user = $this->userModel->findByEmailAndPassword($correo_electronico, $contrasena);

            if ($user) {
                $_SESSION['numero_identificacion'] = $user['numero_identificacion'];
                header('Location: /app_consulta_php_mvc/results'); // Redirige a la página de resultados después de iniciar sesión
                exit();
            } else {
                $status_message = '<div class="alert alert-danger" role="alert">Credenciales incorrectas</div>';
            }
        }

        include 'views/login.php';
    }
}
