<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\ProdutoCategoria;
use Faker\Factory as Faker;

class ProdutosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $produtos = Produto::all();
        $categorias = Categoria::all()->pluck('id')->toArray();

        foreach ($produtos as $produto) {
            $elementos = rand(2, 6);
            for ($i=0; $i <=$elementos ; $i++) { 
                do {
                    $catId = $faker->randomElement($categorias);
                } while (
                    ProdutoCategoria::where('produto_id', $produto->id)->where('categoria_id', $catId)->exists()
                );
                
                ProdutoCategoria::create([
                    'produto_id' => $produto->id,
                    'categoria_id' => $catId,
                ]);
            }
        }
    }
}
