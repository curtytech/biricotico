<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
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
                'name' => 'Agenda de Dezembro',
                'description' => 'Principais shows do mês.',
                'content' => 'Confira os destaques da agenda de dezembro.',
                'banner' => 'https://example.com/news/agenda.jpg',
                'external_link' => 'https://example.com/news/agenda',
            ],
            [
                'user_id' => $lapa->id,
                'name' => 'Samba na Lapa',
                'description' => 'Programação cultural do bairro.',
                'content' => 'Eventos e rodas de samba na Lapa.',
                'banner' => 'https://example.com/news/lapa.jpg',
                'external_link' => 'https://example.com/news/lapa',
            ],
            [
                'user_id' => $gema->id,
                'name' => 'História do Boteco da Gema',
                'description' => 'Origens e tradição.',
                'content' => 'Uma breve história do boteco e sua roda de samba.',
                'banner' => 'https://example.com/news/gema.jpg',
                'external_link' => 'https://example.com/news/gema',
            ],
        ];

        foreach ($rows as $data) {
            News::firstOrCreate(['name' => $data['name'], 'user_id' => $data['user_id']], $data);
        }
    }
}

