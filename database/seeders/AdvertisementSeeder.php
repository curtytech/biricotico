<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use App\Models\User;

class AdvertisementSeeder extends Seeder
{
    public function run(): void
    {
        $biribar = User::where('slug', 'biribar')->first() ?? User::first();
        if (! $biribar) {
            $biribar = User::create([
                'name' => 'Biribar',
                'slug' => 'biribar',
                'email' => 'biribar@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',
            ]);
        }

        $lapa = User::where('slug', 'espaco-lapa')->first() ?? $biribar;
        $gema = User::where('slug', 'boteco-da-gema')->first() ?? $biribar;

        $rows = [
            [
                'user_id' => $biribar->id,
                'name' => 'Promoção de Chopp',
                'description' => 'Chopp em dobro até as 20h.',
                'banner' => 'https://example.com/banners/chopp1.jpg',
                'external_link' => 'https://example.com/promo/chopp',
            ],
            [
                'user_id' => $lapa->id,
                'name' => 'Semana do Samba',
                'description' => 'Ingressos com 20% off.',
                'banner' => 'https://example.com/banners/samba1.jpg',
                'external_link' => 'https://example.com/promo/samba',
            ],
            [
                'user_id' => $gema->id,
                'name' => 'Dose Dupla',
                'description' => 'Dose dupla no pagode de sábado.',
                'banner' => 'https://example.com/banners/dose.jpg',
                'external_link' => 'https://example.com/promo/dose',
            ],
        ];

        foreach ($rows as $data) {
            Advertisement::firstOrCreate(['name' => $data['name'], 'user_id' => $data['user_id']], $data);
        }
    }
}

