<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProdutosController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $expiration = 3600;
        $produtos = Cache::remember('allprodutos', $expiration, function () {
            return Produto::with('categorias')->get();
        });

        return view('produtos', compact(['produtos']));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {
        Produto::create([
            'nome' => 'teste',
            'preco' => 12
        ]);
    }

    /**
     * Undocumented function
     *
     * @param  Request  $request
     * @return void
     */
    public function update(Request $request)
    {
        $produto = Produto::find($request->id);

        $produto->nome = 'lucas';
        $produto->preco = 15;

        $produto->save();
    }

    /**
     * Undocumented function
     *
     * @param  Request  $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $produto = Produto::find($request->id);
        $produto->delete();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getCache()
    {
        $getCache = Cache::store('redis')->get('allprodutos');
        return $getCache;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function forgetCache()
    {
        Cache::forget('allprodutos');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function putCache()
    {
        $putCache = Cache::put('allprodutos', '123', 60);
        return $putCache;
    }

    /**
     * Undocumented function
     *
     * @return bool
     */
    public function hasCache()
    {
        $hasCache = Cache::has('allprodutos');

        if (empty($hasCache)) {
           return 'Não está cacheado';
        }

        return 'Está na cache';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function flushCache()
    {
        Cache::flush();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function tagsCache()
    {
        $tag = Cache::tags('products')->put('allprodutos', 'testeTag', 3600);
        return $tag;
    }


    // TAGS

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getTagsCache()
    {
        $tagCache = config('cache.objects.tags.products');
        $tags = Cache::tags($tagCache)->get('allprodutos');
        return $tags;
    }

    /**
     * Undocumented function
     *
     * @return bool
     */
    public function hasTagCache()
    {
        $cacheStore = config('cache.objects.stores.allprodutos');
        $cacheKey = 'allprodutos';

        $hasTagCache = Cache::store($cacheStore)->tags('produtoscategorias')->has($cacheKey);

        if (empty($hasTagCache)) {
            return 'Não contém tags';
        }

        return 'Existe tag';
       
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function flushTagsCache()
    {
        $tagCache = config('cache.objects.tags.products');
        Cache::tags($tagCache)->flush();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function final()
    {
        $cacheStore = config('cache.objects.stores.allprodutos');
        $cacheKey = 'allprodutos';
        $tagCache = config('cache.objects.tags.products');

        return Cache::store($cacheStore)->tags($tagCache)->remember(
            $cacheKey,
            config('cache.expiration_time.one_minute'),
            function () {
                return Produto::with('categorias')->get();
            }
        );
    }
}
