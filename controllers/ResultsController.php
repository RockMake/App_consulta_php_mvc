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
        $rango_edad_hijos = $usuario['rango_edad_hijos'];
        $victima_conflicto_armado = $usuario['victima_conflicto_armado'];
        $discapacidad = $usuario['discapacidad'];
        $grupo_etnico = $usuario['grupo_etnico'];

        // Lógica para evaluar cada programa de beneficio
        $fecha_actual = new DateTime();
        $fecha_nacimiento = new DateTime($fecha_nacimiento);
        $edad = $fecha_actual->diff($fecha_nacimiento)->y;

        $edad_minima_pension = 54; // Para mujeres
        if ($sexo == 'masculino') {
            $edad_minima_pension = 59; // Para hombres
        }

        $cumple_edad_colombia_mayor = ($edad >= ($edad_minima_pension - 3) && $grupo_sisben <= 'C1');
        $cumple_renta_ciudadana = (($grupo_sisben >= 'A1' && $grupo_sisben <= 'B7') or ($rango_edad_hijos == '0-6') or ($victima_conflicto_armado == 'si') or ($grupo_etnico == 'pueblo_indigena'));

        // Evaluación de programas
        if ($cumple_edad_colombia_mayor) {
            $resultadosProgramas .= "<div class='alert alert-success' role='alert'>
                 ¡Felicidades! Cumple con la edad y con el Sisben ICV para el programa 'Colombia Mayor'.<br><br>

                    

                    Descripcion del programa:<br>
                    El Programa de Protección Social al Adulto Mayor “Colombia Mayor” busca aumentar la protección a los 
                    adultos mayores por medio de la entrega de un subsidio económico para aquellos que se encuentran 
                    desamparados, que no cuentan con una pensión, o viven en la extrema pobreza.<br><br>

                    Para inscribirse el adulto debe cumplir con los siguientes requisitos:<br>
                    -Ser colombiano.<br>
                    -Haber residido durante los últimos diez (10) años en el territorio nacional.<br>
                    -Tener mínimo tres años menos de la edad que se requiere para pensionarse por vejez (Cumple)<br>
                    -Carecer de rentas o ingresos suficientes para subsistir. De acuerdo con SISBÉN IV, se toman todos los 
                    niveles de los grupos A y B y C hasta el subgrupo C1.<br><br>
                    ¿Cómo me puedo inscribir en el programa Colombia Mayor?<br>
                    1. Ubicar el punto de atención:<br>
                    -Acércate a la alcaldía de tu municipio con tu cédula de ciudadanía original.<br>
                    -En la mayoría de los municipios, el trámite se realiza en la Oficina de Atención al Adulto Mayor.<br>
                    -En Bogotá, la inscripción se adelanta en las Subdirecciones Locales de la Secretaría de Integración
                    Social, antiguos COL.<br><br>
            
                    2. Presentar la documentación requerida:<br>
                    -Cédula de ciudadanía original del adulto mayor.<br>
                    -Un poder notarial en caso de que el trámite lo realice un tercero.<br>
                    -Certificado de defunción del cónyuge, si es el caso.<br><br>

                    Información adicional:<br><br>

                        -Línea de atención gratuita: 192<br>
                        -Página web del programa Colombia Mayor:
                         <a href= https://prosperidadsocial.gov.co/Noticias/category/colombia-mayor/>Página web </a><br><br>
                        Recuerda:<br><br>
                        
                        -El programa Colombia Mayor es gratuito.<br>
                        -No es necesario contar con intermediarios para realizar la inscripción.<br>
                        -Puedes verificar el estado de tu solicitud en la página web del programa.<br>
            </div>";
        } else {
            $resultadosProgramas .= "<div class='alert alert-danger' role='alert'>
                Lo sentimos, no cumple con la edad para el programa 'Colombia Mayor'.
            </div>";
        }

        if ($cumple_renta_ciudadana) {
            $resultadosProgramas .= "<div class='alert alert-success' role='alert'>
                ¡Felicidades! Usted es un potencial beneficiario para el programa 'Renta Ciudadana'.<br><br>

                    Descripción del programa:<br>
                    La Renta Ciudadana es un programa comandado por el Departamento de Prosperidad Social que busca 
                    ayudar a los hogares en situación de pobreza extrema y moderada, quienes recibirán ingresos de 
                    hasta $500.000 que les permitan superar al hambre, la línea de pobreza y romper las brechas de desigualdad.

                    Su implementación se llevará a cabo de manera gradual y progresiva a través de diversas líneas de intervención.<br><br>

                    Requisitos:<br>
                    -Encuestados por el Sisbén que estén en grupos (A1-A5) y beneficiarios cada año (B1-B7).<br>
                    -Madre cabezas de hogar que tengan niños y niñas menores de 6 años.<br>
                    -Personas con discapacidad que requieran atención permanente.<br>
                    -La prioridad del municipio donde se registró la familia.<br>
                    -Características poblacionales (que sea hogar víctima de desplazamiento o perteneciente a una comunidad indígena).<br>
                    -Cumplimiento de corresponsabilidades en salud y educación.<br><BR>

                    Consulte para saber si eres benefiario:
                    <a href= https://rentaciudadana.prosperidadsocial.gov.co/>Consulta aqui. </a><br><br>

                    Información adicional:<br><br>

                    -Atención al Ciudadano: 01-8000-95-1100 (Línea Gratuita Nacional)<br>
                    -Página web del programa Renta Ciudadana:
                     <a href= https://prosperidadsocial.gov.co/sgpp/transferencias/renta-ciudadana/>Página web </a><br><br>

                    Recuerda:<br><br>
                    
                    -El programa Colombia Mayor es gratuito.<br>
                    -El programa Renta Ciudadana no tiene un proceso de inscripción abierto al público. En lugar de eso, es la 
                    entidad Prosperidad Social la que se encarga de la identificación, selección y vinculación de los hogares 
                    potenciales beneficiarios a través de registros administrativos de las fuentes oficiales que sean definidas1. 
                    Por lo tanto, no es necesario que los hogares se inscriban por sí mismos.<br>
            </div>";
        } else {
            $resultadosProgramas .= "<div class='alert alert-danger' role='alert'>
                    Lo sentimos, no cumple con ninguno requisitos para el programa 'Renta Ciudadana'.<br><br>

                    Aunque hay una pequeña posibilidad de que pueda ser beneficiario.
                    <a href= https://rentaciudadana.prosperidadsocial.gov.co/>Consulta aqui. </a><br>
            </div>";
        }

        if ($victima_conflicto_armado == 'si') {
            $resultadosProgramas .= "<div class='alert alert-success' role='alert'>
                ¡Felicidades! Usted es un potencial beneficiario para el programa 'Fondo de Reparación para el Acceso, Permanencia y Graduación en Educación Superior para Víctimas del Conflicto Armado en Colombia '.<br><br>
                
                Descripción del programa:<br>   

                El 'Fondo de Reparación para el Acceso, Permanencia y Graduación en Educación Superior para Víctimas del Conflicto Armado en Colombia' es una iniciativa 
                del Gobierno colombiano en cumplimiento con la Ley 1448 de 2011, que busca facilitar el acceso a la educación superior a las víctimas del conflicto armado 
                en el país. Este fondo es administrado por el ICETEX en colaboración con otras entidades como la Unidad para las Víctimas y el Ministerio de Educación Nacional.<br><br>
                
                El objetivo principal del fondo es financiar programas académicos en niveles técnico, tecnológico y profesional, ofreciendo créditos educativos 100% condonables 
                para cubrir hasta once Salarios Mínimos Mensuales Legales Vigentes (11 SMMLV) por semestre en costos de matrícula, además de proporcionar un recurso de sostenimiento 
                por 1.5 SMMLV por semestre. También incluye un recurso de permanencia dirigido a instituciones educativas que desarrollen programas con enfoque de reparación integral.<br><br>

                Los beneficiarios deben estar registrados como víctimas en el Registro Único de Víctimas (RUV) o reconocidos en procesos específicos como Restitución de Tierras, Justicia y Paz, 
                entre otros. Además, deben estar admitidos o en proceso de admisión en una institución reconocida por el Ministerio de Educación Nacional en Colombia y no contar con apoyo económico 
                adicional para sus estudios superiores.<br><br>


                Requisitos:<br>
                -Ser ciudadano/a colombiano/a<br>
                -Estar incluido en el Registro Único de Víctimas (RUV) o ser reconocido en procesos de Restitución de Tierras, Justicia y Paz, 
                Jurisdicción Especial para la Paz o de la Corte Interamericana de Derechos Humanos.<br>
                -No tener apoyo económico adicional de entidades nacionales u otros organismos para adelantar estudios de educación superior en 
                el nivel universitario.<br>
                -No tener título de nivel universitario
                -Estar admitido o en proceso de admisión en una Institución de Educación Superior reconocida por el Ministerio de Educación Nacional<br>
                -Haber presentado la prueba Saber 11 o la prueba de estado equivalente<br><br>
                

                Para mayor informacion ingrese a <a href= />https://web.icetex.gov.co/es/-/poblacion-victima-del-conflicto-armado-en-colombia </a><br><br>

                 Información adicional:<br><
                 El fondo también incluye la Estrategia 'Construyendo mi Futuro', que ofrece acompañamiento y orientación a los beneficiarios para garantizar su permanencia, graduación y la condonación 
                de los créditos educativos.<br><br>


            </div>";
        } else {
            $resultadosProgramas .= "<div class='alert alert-danger' role='alert'>
                Lo sentimos, no cumple con los requisitos para el programa 'Fondo de Reparación para el Acceso, Permanencia y Graduación en Educación Superior para Víctimas del Conflicto Armado en Colombia '.
            </div>";
        }

        return $resultadosProgramas;
    }
}
