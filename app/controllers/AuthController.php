<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;

class AuthController extends Controller {
    protected AuthService $auth;

    public function __construct() {
        $this->auth = new AuthService();
    }

    public function loginForm() {
        $this->view('auth/login');
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($this->auth->attemptLogin($email, $password)) {
            redirect(isset($_SESSION['intended_url']) ? $_SESSION['intended_url'] : 'account');
        }
        $_SESSION['error'] = 'Email atau password salah.';
        redirect('login');
    }

    public function registerForm() {
        $this->view('auth/register');
    }

    public function register() {
        $data = $_POST;
        $errors = $this->validate($data, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $data;
            redirect('register');
        }
        $this->auth->register($data);
        $this->auth->attemptLogin($data['email'], $data['password']);
        redirect('account');
    }

    public function logout() {
        $this->auth->logout();
        redirect('/');
    }
}
