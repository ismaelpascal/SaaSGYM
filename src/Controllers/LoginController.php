<?php

require_once __DIR__ . '/../Models/LoginModel.php';

class LoginController
{
    public function login()
    {
        unset($_SESSION['login_error']);

        $username = $_POST['user'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['login_error'] = 'Por favor, completa ambos campos.';
            header('Location: /SaaSGYM/public/login');
            exit();
        }

        $user = LoginModel::findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nombre'] = $user['nombre'];

            header('Location: /SaaSGYM/public/clients');
            exit();
        } else {
            $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
            header('Location: /SaaSGYM/public/login');
            exit();
        }
    }

    public function logout()
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('Location: /SaaSGYM/public/login');
        exit();
    }
}
