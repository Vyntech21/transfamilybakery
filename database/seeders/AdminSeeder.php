<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Membuat akun admin dari .env (tidak ada password di dalam kode):
 *   ADMIN_NAME=Admin TransFamily
 *   ADMIN_EMAIL=admin@contoh.com
 *   ADMIN_PASSWORD=isi-password-kuat-minimal-12-karakter
 * Jalankan: php artisan db:seed --class=AdminSeeder
 * Setelah berhasil, hapus ADMIN_PASSWORD dari .env.
 */
class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password || strlen($password) < 12) {
            $this->command?->error('Isi ADMIN_EMAIL dan ADMIN_PASSWORD (min. 12 karakter) di .env dulu.');
            return;
        }

        $user = User::firstOrNew(['email' => $email]);
        $user->name = env('ADMIN_NAME', 'Admin TransFamily');
        $user->password = Hash::make($password);
        $user->is_admin = true;
        $user->save();

        $this->command?->info("Admin siap: {$email}");
    }
}
