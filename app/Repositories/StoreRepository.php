<?php

namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
    protected $store;

    public function __construct(
        Store $store,
    )
    {
        $this->store = $store;
    }

    public function index()
    {
        $stores = $this->store
        ->orderBy('created_at', 'DESC')
        ->get();
        return $stores;
    }

    public function store($request)
    {
        return $this->store->create($request);
    }

    public function destroy($id)
    {
        return $this->store->findOrFail($id)->delete();
    }

    public function show($id)
    {
        $store = $this->store->findOrFail($id);
        return $store;
    }
}