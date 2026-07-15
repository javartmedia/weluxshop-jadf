<?php
namespace App\Services;

use App\Models\User;

class AuthService {
    public function attemptLogin(string $email, string $password): bool {
        $user = User::findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function register(array $data): int {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['role'] = 'customer';
        return User::create($data);
    }

    public function logout(): void {
        session_unset();
        session_destroy();
    }
}
