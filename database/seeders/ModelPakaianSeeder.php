<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelPakaian;

class ModelPakaianSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_model' => 'Hoodie Hangat',
                'kategori' => 'Jaket',
                'ukuran' => 'L',
                'warna' => 'Hitam',
                'kebutuhan_bahan' => 1.5,
            ],
            [
                'nama_model' => 'Kaos Polos',
                'kategori' => 'Baju',
                'ukuran' => 'M',
                'warna' => 'Putih',
                'kebutuhan_bahan' => 1.2,
            ],
            [
                'nama_model' => 'Jaket Outdoor',
                'kategori' => 'Jaket',
                'ukuran' => 'XL',
                'warna' => 'Hijau',
                'kebutuhan_bahan' => 2.0,
            ],
            [
                'nama_model' => 'Kemeja Formal',
                'kategori' => 'Baju',
                'ukuran' => 'L',
                'warna' => 'Biru',
                'kebutuhan_bahan' => 1.8,
            ],
            [
                'nama_model' => 'Sweater Rajut',
                'kategori' => 'Sweater',
                'ukuran' => 'M',
                'warna' => 'Abu-abu',
                'kebutuhan_bahan' => 1.6,
            ],
        ];

        foreach ($data as $item) {
            ModelPakaian::create($item);
        }
    }
}
