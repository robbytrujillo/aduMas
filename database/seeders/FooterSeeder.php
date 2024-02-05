<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Footer::create([
        'platform' => 'facebook',
        'nama_halaman' => 'Nama Halaman Facebook',
        'link_url' => 'https://www.facebook.com/example',
       ]);

       Footer::create([
        'platform' => 'twitter',
        'nama_halaman' => 'Nama Halaman Twitter',
        'link_url' => 'http://www.twitter.com/example',
       ]);

       Footer::create([
        'platform' => 'instagram',
        'nama_halaman' => 'Nama Halaman Instagram',
        'link_url' => 'http://www.instagram.com/example',
       ]);
       
       Footer::create([
        'platform' => 'whatsapp',
        'nama_halaman' => 'Nama Whatsapp',
        'link_url' => 'http://wa.me/example',
       ]);

       Footer::create([
        'platform' => 'email',
        'nama_halaman' => 'email@mail.com',
        'link_url' => 'http://mailto.com/example',
       ]);

       Footer::create([
        'platform' => 'phone',
        'nama_halaman' => 'phone',
        'link_url' => 'http://phone.com/example',
       ]);
       
       Footer::create([
        'platform' => 'address',
        'nama_halaman' => 'address',
        'link_url' => 'http://maps.com/example',
       ]);
       
       Footer::create([
        'platform' => 'faqs',
        'nama_halaman' => 'faqs',
        'link_url' => 'http://faqs.com/example',
       ]);
       
       Footer::create([
        'platform' => 'privacy',
        'nama_halaman' => 'privacy',
        'link_url' => 'http://privacy.com/example',
       ]);
    }
}
