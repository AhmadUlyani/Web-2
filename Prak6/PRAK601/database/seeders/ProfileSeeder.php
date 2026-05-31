<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'nama_lengkap' => 'Ahmad Ulyani',
            'gambar' => 'profile.jpg',
            'nim' => '2410817210008',
            'asal_prodi' => 'Teknologi Informasi',
            'hobi' => 'Main game, mendengarkan musik, dan membaca',
            'skill' => 'Jago main goldlane, bisa dengerin musik 10 jam nonstop, masak nasi goreng',
            'informasi_tambahan' => 'Global 1 Claude, Global 1 Beatrix, Global 1 Brody.',
        ]);
    }
}