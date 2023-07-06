<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Produto;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 1000) as $index) {
            Produto::create([
                'nome' => $faker->word,
                'preco' => $faker->randomFloat(2,1, 1000)
            ]);
        }
    }
}
