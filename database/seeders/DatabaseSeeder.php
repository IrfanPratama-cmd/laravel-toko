<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BarangSeeder::class);

        User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'role' => "Admin",
            'password' => bcrypt('12345'),
            'email_verified_at' => date(now()),
            'created_at' => new \DateTime,
        ]);

        User::create([
            'name' => "Irfan",
            'email' => "irfan@gmail.com",
            'role' => "User",
            'password' => bcrypt('12345'),
            'email_verified_at' => date(now()),
            'created_at' => new \DateTime,
        ]);

        Kategori::create([
            'kategori' => "Elektronik",

        ]);

        Kategori::create([
            'kategori' => "Makanan",
        ]);
    }
}
