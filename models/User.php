<?php
class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($data)
    {
        try {
            $sql = "INSERT INTO Usuarios (tipo_identificacion, numero_identificacion, correo_electronico, nombres, apellidos, sexo, fecha_nacimiento, departamento_residencia, municipio_residencia, direccion_residencia, telefono_celular, contrasena, grupo_etnico, grupo_sisben, discapacidad, tipo_discapacidad, estado_civil, victima_conflicto_armado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return true; // Retorna true si la inserción fue exitosa
        } catch (PDOException $e) {
            // Aquí puedes manejar cualquier excepción específica de PDO
            // Por ejemplo, puedes mostrar el mensaje de error o loguearlo
            echo "Error en la inserción: " . $e->getMessage();
            return false; // Retorna false si hubo un error
        }
    }
    public function findByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM Usuarios WHERE correo_electronico = ? AND contrasena = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email, $password]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Aquí puedes manejar cualquier excepción específica de PDO
            // Por ejemplo, puedes mostrar el mensaje de error o loguearlo
            echo "Error en la consulta: " . $e->getMessage();
            return null; // Retorna null si hubo un error
        }
    }
    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM Usuarios WHERE numero_identificacion = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error en findById: " . $e->getMessage();
            return false;
        }
    }
}
