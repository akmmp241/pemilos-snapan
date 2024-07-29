<?php

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('testajadulu', function () {
    $nonceSize = openssl_cipher_iv_length('aes-256-cbc');
    $nonce = openssl_random_pseudo_bytes($nonceSize);
    $test = openssl_encrypt("hai abangku", 'aes-256-cbc', env('ENCRYPT_KEY'), 0, $nonce);
    $text = base64_encode($test);
    Log::info($text);
    $cipherText = base64_decode($test);
    $decrypt = openssl_decrypt($cipherText, 'aes-256-cbc', env('ENCRYPT_KEY'), 0, $nonce);
    Log::info($decrypt);
});

Artisan::command('import:user {file}', function ($file) {
    $path = '';
    if (str_starts_with($file, '/')) {
        $path = $file;
    } else {
        $path = getcwd() . '/' . $file;
    };

    $users = [];
    if ($resource = fopen($path, 'r')) {
        $firstRow = true;
        while ($data = fgetcsv($resource, 1000, ',')) {
            if ($firstRow) {
                $firstRow = false;
                continue;
            }

            $role = null;
            $class = null;
            switch (strtoupper($data[2])) {
                case 'MURID':
                    $role = User::STUDENT;
                    $class = $data[3];
                    break;
                case 'GURU':
                    $role = User::TEACHER;
                    break;
                case 'STAFF':
                    $role = User::STAFF;
                    break;
            }

            $users[] = [
                'name' => $data[0],
                'username' => $data[1],
                'role_id' => $role,
                'class' => $class ?? null,
                'password' => strtoupper($data[2]) . $data[1],
            ];
        }
        fclose($resource);
    }

    $users = array_reverse($users);

    DB::transaction(function () use ($users) {
        foreach ($users as $user) {
            try {
                User::query()->create([
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'class' => $user['class'],
                    'password' => Hash::make($user['password']),
                ]);

                $this->info("\"{$user['name']}\",{$user['username']},{$user['password']}");

                $filename = $user['role_id'] === User::STUDENT
                    ? $user['class'] . '.csv'
                    : 'Guru-Karyawan.csv';

                Storage::disk('local')
                    ->prepend(
                        "users/{$filename}",
                        "\"{$user['name']}\",{$user['username']},{$user['password']}"
                    );
            } catch (QueryException $exception) {
                $this->warn($exception->getMessage() . PHP_EOL);
            }
        }
    });
})->purpose('Seed User from CSV file');
