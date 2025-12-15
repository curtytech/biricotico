<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Biribar',
                'slug' => 'biribar',
                'image' => 'https://images.unsplash.com/photo-1665686310934-8fab52b3821b?auto=format&fit=crop&w=256&q=60',
                'primary_color' => '#f59e0b',
                'secondary_color' => '#ef4444',
                'template' => 'default',
                'cover_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=60',
                'email' => 'biribar@example.com',
                'facebook' => 'https://facebook.com/biribar',
                'whatsapp' => '5521999999999',
                'instagram' => 'https://instagram.com/biribar',
                'twitter' => 'https://twitter.com/biribar',
                'linkedin' => 'https://linkedin.com/in/biribar',
                'other_social_networks' => ['tiktok' => 'https://tiktok.com/@biribar'],
                'phone' => '+55 (21) 99999-9999',
                'address' => 'Rua das Laranjeiras',
                'number' => '123',
                'city' => 'Rio de Janeiro',
                'state' => 'RJ',
                'neighborhood' => 'Laranjeiras',
                'country' => 'Brasil',
                'zipcode' => '22240-003',
                'location_link' => 'https://maps.app.goo.gl/pbgLjLXriQdeWTXS7',
                'password' => Hash::make('12345678'),
                'role' => 'user',
            ],
            [
                'name' => 'Espaço Lapa',
                'slug' => 'espaco-lapa',
                'image' => 'https://images.unsplash.com/photo-1529333166437-7750f36f7bf0?auto=format&fit=crop&w=256&q=60',
                'primary_color' => '#ef4444',
                'secondary_color' => '#f59e0b',
                'template' => 'default',
                'cover_image' => 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=1200&q=60',
                'email' => 'lapa@example.com',
                'facebook' => 'https://facebook.com/espacolapa',
                'whatsapp' => '5521988888888',
                'instagram' => 'https://instagram.com/espacolapa',
                'twitter' => 'https://twitter.com/espacolapa',
                'linkedin' => null,
                'other_social_networks' => ['youtube' => 'https://youtube.com/@espacolapa'],
                'phone' => '+55 (21) 98888-8888',
                'address' => 'Av. Mem de Sá',
                'number' => '45',
                'city' => 'Rio de Janeiro',
                'state' => 'RJ',
                'neighborhood' => 'Lapa',
                'country' => 'Brasil',
                'zipcode' => '20230-150',
                'location_link' => 'https://maps.google.com/?q=-22.908, -43.178',
                'password' => Hash::make('12345678'),
                'role' => 'user',
            ],
            [
                'name' => 'Boteco da Gema',
                'slug' => 'boteco-da-gema',
                'image' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=256&q=60',
                'primary_color' => '#10b981',
                'secondary_color' => '#f59e0b',
                'template' => 'default',
                'cover_image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1200&q=60',
                'email' => 'gema@example.com',
                'facebook' => 'https://facebook.com/botecodagema',
                'whatsapp' => '5521977777777',
                'instagram' => 'https://instagram.com/botecodagema',
                'twitter' => null,
                'linkedin' => null,
                'other_social_networks' => ['threads' => 'https://www.threads.net/@botecodagema'],
                'phone' => '+55 (21) 97777-7777',
                'address' => 'Praça da Harmonia',
                'number' => '10',
                'city' => 'Rio de Janeiro',
                'state' => 'RJ',
                'neighborhood' => 'Saúde',
                'country' => 'Brasil',
                'zipcode' => '20081-220',
                'location_link' => 'https://maps.google.com/?q=-22.898, -43.179',
                'password' => Hash::make('12345678'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(['email' => $data['email']], $data);
            if (! $user->email_verified_at) {
                $user->email_verified_at = now();
                $user->save();
            }
        }
    }
}
