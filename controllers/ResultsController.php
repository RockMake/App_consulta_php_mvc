<?php
class ResultsController
{
    private $user_model;
    private $pdo;

    public function __construct($pdo)
    {
        $this->user_model = new User($pdo);
        $this->pdo = $pdo;
    }

    public function index()
    {
        session_start();

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['numero_identificacion'])) {
            header('Location: /app_consulta_php_mvc/login');
            exit();
        }

        // Obtener datos del usuario autenticado
        $usuario = $this->user_model->findById($_SESSION['numero_identificacion']);

        if (!$usuario) {
            echo "Error: No se encontró el usuario.";
            exit();
        }

        // Lógica para evaluar programas de beneficios
        $resultadosProgramas = $this->evaluarProgramas($usuario);

        include 'views/results.php';
    }

    private function evaluarProgramas($usuario)
    {
        $resultadosProgramas = '';

        // Extraer datos relevantes del usuario
        $fecha_nacimiento = $usuario['fecha_nacimiento'];
        $grupo_sisben = $usuario['grupo_sisben'];
        $sexo = $usuario['sexo'];
        $victima_conflicto_armado = $usuario['victima_conflicto_armado'];
        $discapacidad = $usuario['discapacidad'];

        // Lógica para evaluar cada programa de beneficio
        $fecha_actual = new DateTime();
        $fecha_nacimiento = new DateTime($fecha_nacimiento);
        $edad = $fecha_actual->diff($fecha_nacimiento)->y;

        $edad_minima_pension = 54; // Para mujeres
        if ($sexo == 'masculino') {
            $edad_minima_pension = 59; // Para hombres
        }

        $cumple_edad_colombia_mayor = ($edad >= ($edad_minima_pension - 3) && $grupo_sisben <= 'C1');
        $cumple_renta_ciudadana = ($grupo_sisben >= 'A1' && $grupo_sisben <= 'B7');

        // Evaluación de programas
        if ($cumple_edad_colombia_mayor) {
            $resultadosProgramas .= "<div class='alert alert-success' role='alert'>
                ¡Felicidades! Cumple con la edad y con el Sisben ICV para el programa 'Colombia Mayor'.<br><br>
                Descripción del programa: El programa 'Colombia Mayor' busca proteger a los adultos mayores de 54 años (mujeres) o 59 años (hombres) que se encuentran en situación de pobreza extrema, pobreza o vulnerabilidad, y que no cuentan con una pensión ni posibilidad de obtenerla.
            </div>";
        } else {
            $resultadosProgramas .= "<div class='alert alert-danger' role='alert'>
                Lo sentimos, no cumple con la edad para el programa 'Colombia Mayor'.
            </div>";
        }

        if ($cumple_renta_ciudadana) {
            $resultadosProgramas .= "<div class='alert alert-success' role='alert'>
                ¡Felicidades! Usted puede ser posible beneficiario para el programa 'Renta Ciudadana'.<br><br>
                Descripción del programa: 'Renta Ciudadana' busca garantizar un ingreso básico para las familias en situación de pobreza extrema y vulnerabilidad, clasificadas en los grupos A y B del Sisbén.
            </div>";
        } else {
            $resultadosProgramas .= "<div class='alert alert-danger' role='alert'>
                Lo sentimos, no cumple con los requisitos para el programa 'Renta Ciudadana'.
            </div>";
        }

        if ($victima_conflicto_armado == 'si') {
            $resultadosProgramas .= "<div class='alert alert-success' role='alert'>
                ¡Felicidades! Cumple con los requisitos para el programa 'Asistencia Integral a las Víctimas del Conflicto Armado'.<br><br>
                Descripción del programa: Este programa brinda apoyo económico, social y psicológico a las personas que han sido víctimas del conflicto armado en Colombia, ayudándoles en su proceso de recuperación y reintegración.
            </div>";
        } else {
            $resultadosProgramas .= "<div class='alert alert-danger' role='alert'>
                Lo sentimos, no cumple con los requisitos para el programa 'Asistencia Integral a las Víctimas del Conflicto Armado'.
            </div>";
        }

        return $resultadosProgramas;
    }
}
