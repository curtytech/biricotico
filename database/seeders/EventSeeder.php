<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class EventSeeder extends Seeder
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
                'name' => 'Roda de Samba da Lapa',
                'description' => 'Clássicos e autorais.',
                'banner' => 'https://images.unsplash.com/photo-1546622891-02c72c1537b6?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'external_link' => 'https://example.com/events/lapa',
                'price' => '00.00',
                'date_open' => '2025-12-10',
                'date_close' => '2025-12-10',
                'time_open' => '20:00',
                'time_close' => '23:00',
            ],
            [
                'user_id' => $lapa->id,
                'name' => 'Pagode no Espaço Lapa',
                'description' => 'Grupo local e convidados.',
                'banner' => 'https://plus.unsplash.com/premium_photo-1661695810257-35142e1415ca?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'external_link' => 'https://example.com/events/pagode',
                'price' => '00.00',
                'date_open' => '2025-12-12',
                'date_close' => '2025-12-12',
                'time_open' => '21:00',
                'time_close' => '00:00',
            ],
            [
                'user_id' => $gema->id,
                'name' => 'Samba no Boteco da Gema',
                'description' => 'Roda de samba tradicional.',
                'banner' => 'https://plus.unsplash.com/premium_photo-1723924878055-37ba67a1f11d?q=80&w=723&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'external_link' => 'https://example.com/events/gema',
                'price' => '20.00',
                'date_open' => '2025-12-15',
                'date_close' => '2025-12-15',
                'time_open' => '19:30',
                'time_close' => '22:30',
            ],
        ];

        foreach ($rows as $data) {
            Event::firstOrCreate(['name' => $data['name'], 'user_id' => $data['user_id']], $data);
        }
    }
}

