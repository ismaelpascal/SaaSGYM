<?php

require_once __DIR__ . '/../Models/LoginModel.php';

class LoginController
{
    /**
     * Procesa el intento de inicio de sesión.
     */
    public function login()
    {
        // Limpiar errores de sesión anteriores
        unset($_SESSION['login_error']);

        $username = $_POST['user'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['login_error'] = 'Por favor, completa ambos campos.';
            header('Location: /SaaSGYM/public/login');
            exit();
        }

        $user = LoginModel::findByUsername($username);

        // Verificar si el usuario existe y la contraseña es correcta
        // Se usa password_verify para comparar la contraseña ingresada con el hash guardado.
        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión exitosamente
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nombre'] = $user['nombre'];

            // Redirigir al panel de clientes
            header('Location: /SaaSGYM/public/clients');
            exit();
        } else {
            // Error de autenticación
            $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
            header('Location: /SaaSGYM/public/login');
            exit();
        }
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        // Destruir todos los datos de la sesión.
        $_SESSION = [];

        // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalmente, destruir la sesión.
        session_destroy();

        // Redirigir a la página de login
        header('Location: /SaaSGYM/public/login');
        exit();
    }
}
