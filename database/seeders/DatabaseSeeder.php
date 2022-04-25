<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();

        User::create([
            'name' => 'Osmair Coelho',
            'email' => 'osmair.dev@softmus.com.br',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => bcrypt('secret'),
        ]);
        $this->call( PostTableSeeder::class );
    }
}
