<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="card">
        <h1 class="card-header">Resultados</h1>

        <!-- Mostrar los resultados de los programas -->
        <?php echo $resultadosProgramas; ?>

        <div class="text-center mt-4">
            <button id="logout" class="btn btn-danger">Cerrar Sesión</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.getElementById('logout').addEventListener('click', function() {
        window.location.href = '/app_consulta_php_mvc/login'; // Ajusta la URL según tu estructura de directorios
    });
</script>

<?php include 'includes/footer.php'; ?>