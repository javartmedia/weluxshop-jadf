<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository {
    protected string $modelClass = User::class;
    protected string $table = 'users';

    public function findByEmail(string $email): ?array {
        return User::findByEmail($email);
    }
}
