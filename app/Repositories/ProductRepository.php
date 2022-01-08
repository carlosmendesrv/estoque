<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(
        Product $product,
    )
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function store($request)
    {
        return $this->product->create($request);
    }

    public function destroy($id)
    {
        return $this->product->findOrFail($id)->delete();
    }

    public function show($id)
    {
        $product = $this->product->findOrFail($id);
        return $product;
    }
}
