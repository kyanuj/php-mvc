<?php
require_once '../app/Models/UserModel.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Obtener el usuario de la base de datos por su nombre de usuario
            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            // Verificar si el usuario existe y las credenciales son válidas
            if ($user && password_verify($password, $user['password'])) {
                // Credenciales válidas, iniciar sesión
                // Aquí puedes establecer una sesión o utilizar algún sistema de autenticación
                // dependiendo de tus necesidades.

                // Por ejemplo, guardar el ID del usuario en una sesión:
                session_start();
                $_SESSION['user_id'] = $user['id'];

                // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
                header('Location: /dashboard');
                exit();
            } else {
                // Credenciales inválidas, mostrar un mensaje de error o redirigir a la página de inicio de sesión con un mensaje
            }
        }

        // Si no se envió el formulario de inicio de sesión, cargar la vista de inicio de sesión
        require_once '../app/views/auth/login.php';
    }

    public function logout()
    {
        // Terminar la sesión (puedes utilizar session_destroy() u otro método)
        session_start();
        session_unset();
        session_destroy();

        // Redirigir al usuario a la página de inicio después del cierre de sesión
        header('Location: index.php');
        exit();
    }
}

