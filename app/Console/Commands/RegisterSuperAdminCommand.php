<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class RegisterSuperAdminCommand extends Command
{
    protected $signature = 'register:super-admin';

    protected $description = 'Register Super Admin';

    public function __construct(private readonly User $user)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $credentials = $this->getCredentials();

        $superAdmin = $this->user->newQuery()->create($credentials);

        $this->display($superAdmin);
    }

    private function getCredentials(): array
    {
        $credentials['name'] = $this->ask('Name');
        $credentials['username'] = $this->ask('Username');
        $credentials['role_id'] = User::SUPER_ADMIN;
        $credentials['password'] = $this->secret('Password');
        $credentials['confirm_password'] = $this->secret('Confirm password');

        while (!$this->isValidPassword($credentials['password'], $credentials['confirm_password'])) {
            if (!$this->isRequiredLength($credentials['password'])) {
                $this->error('Password must be more than six characters');
            }

            if (!$this->isMatch($credentials['password'], $credentials['confirm_password'])) {
                $this->error('Password and Confirm password do not match');
            }

            $credentials['password'] = $this->secret('Password');
            $credentials['confirm_password'] = $this->secret('Confirm password');
        }

        $credentials['password_token'] = 'this is super-admin :D';
        $credentials['password'] = bcrypt($credentials['password']);

        return $credentials;
    }

    private function display(Model|User $admin): void
    {
        $headers = ['Name', 'Username', 'Super admin'];

        $fields = [
            'Name' => $admin->name,
            'username' => $admin->username,
            'admin' => $admin->role_id === User::SUPER_ADMIN
                ? 'true' : 'false'
        ];

        $this->info('Super admin created!');

        $this->table($headers, [$fields]);
    }

    private function isValidPassword(string $password, string $confirmPassword): bool
    {
        return $this->isRequiredLength($password) &&
            $this->isMatch($password, $confirmPassword);
    }

    private function isMatch(string $password, string $confirmPassword): bool
    {
        return $password === $confirmPassword;
    }

    private function isRequiredLength(string $password): bool
    {
        return strlen($password) > 6;
    }
}
