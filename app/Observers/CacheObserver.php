<?php

namespace App\Observers;

use App\Models\Produto;
use Illuminate\Support\Facades\Cache;

class CacheObserver
{
    /**
     * Handle the Produto "created" event.
     */
    public function created(Produto $produto): void
    {
        $cacheKey = 'produto:' . $produto->id;
        Cache::put($cacheKey, $produto, 3600);
    }

    /**
     * Handle the Produto "updated" event.
     */
    public function updated(Produto $produto): void
    {
        $cacheKey = 'produto:' . $produto->id;
        Cache::put($cacheKey, $produto, 3600);
    }

    /**
     * Handle the Produto "deleted" event.
     */
    public function deleted(Produto $produto): void
    {
        $cacheKey = 'produto:' . $produto->id;
        Cache::forget($cacheKey); // Limpa o cache de todos os produto
    }

    /**
     * Handle the Produto "restored" event.
     */
    public function restored(Produto $produto): void
    {
        //
    }

    /**
     * Handle the Produto "force deleted" event.
     */
    public function forceDeleted(Produto $produto): void
    {
        //
    }
}
