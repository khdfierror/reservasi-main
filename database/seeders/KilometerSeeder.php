<?php

namespace Database\Seeders;

use App\Models\Service\Kilometer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KilometerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->kilometer();
    }

    public function kilometer()
    {
        $data = [
            'Service Berkala 10000 Km',
            'Service Berkala 60000 Km',
            'Service Berkala 70000 Km',
            'Service Berkala 80000 Km',
            'Service Berkala 90000 Km',
            'Service Berkala 100000 Km',
            'Service Berkala 110000 Km',
            'Service Berkala 120000 Km',
            'Service Berkala 130000 Km',
            'Service Berkala 140000 Km',
            'Service Berkala 150000 Km',
            'Service Berkala 160000 Km',
            'Service Berkala 170000 Km',
            'Service Berkala 180000 Km',
            'Service Berkala 190000 Km',
            'Service Berkala 200000 Km',
        ];

        Kilometer::truncate();

        foreach ($data as $nama) {
            Kilometer::create([
                'nama' => $nama,
            ]);
            $this->command->getOutput()->writeln("<info>Jenis Laporan Created :</info> ". $nama);
        }
    }
}
