<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'judul' => 'PKKMB Universitas',
            'deskripsi' => 'Dapat kawan baru nah',
            'waktu' => 'Semester 1',
            'gambar' => 'experience1.jpg',
            'kesan' => 'Seru, Asik, Menyenangkan',
        ]);

        Experience::create([
            'judul' => 'Mafia Jurnal',
            'deskripsi' => 'Shock berat baru semester 1 sudah ada kasus di prodi sorang',
            'waktu' => 'Semester 1',
            'gambar' => 'experience2.jpg',
            'kesan' => 'Shock berat, Kaget, Kecewa',
        ]);

        Experience::create([
            'judul' => 'Closing Efte-Fest',
            'deskripsi' => 'I wish i was at home playing video games. The music is too loud',
            'waktu' => 'Semester 1',
            'gambar' => 'experience3.jpg',
            'kesan' => 'My feet hurt and i am hungry',
        ]);

        Experience::create([
            'judul' => 'After Benchmarking with HIMA PSKPS',
            'deskripsi' => 'Dapat kawan baru lagi dari beda prodi',
            'waktu' => 'Semester 4',
            'gambar' => 'experience4.jpg',
            'kesan' => 'Alhamdulillah, Bersyukur',
        ]);
    }
}