<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'admin@kalywax.com',
        //     'password' => '123456789'
        // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\Slide::factory(10)->create();
        // \App\Models\Category::factory(10)->create();
        // \App\Models\Collection::factory(10)->create();
        // \App\Models\Product::factory(100)->create();
        // \App\Models\Contact::factory(10)->create();
        // \App\Models\NewsletterSubscriber::factory(10)->create();
        // \App\Models\Country::factory(10)->create();
        // \App\Models\Article::factory(10)->create();
        // \App\Models\Commande::factory(10)->create();
        // \App\Models\CommandeLine::factory(10)->create();
        \App\Models\Payement::factory(10)->create();
    }
}
