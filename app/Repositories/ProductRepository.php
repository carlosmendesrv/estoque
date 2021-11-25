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
        $query = $this->product
            ->orderBy('created_at', 'DESC')->get();
            // ->paginate(20);
          
            // ->get();
        return $query;
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