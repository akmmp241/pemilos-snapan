<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $roles = Collection::make([User::ADMIN, User::STUDENT, User::TEACHER, User::STAFF]);

        $classes = Collection::make([
            'X PPLG 1',
            'X PPLG 2',
            'X PPLG 3',
            'XI PPLG 1',
            'XI PPLG 2',
            'XI PPLG 3',
            'XII RPL 1',
            'XII RPL 2',
            'XII RPL 3',
        ]);

        $user = [
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'role_id' => $roles->random(),
            'password' => bcrypt('password'),
            'password_token' => base64_encode('password'),
            'remember_token' => Str::random(10)
        ];

        if ($user['role_id'] === User::STUDENT) {
            $user['class'] = $classes->random();
        }

        return $user;
    }
}
