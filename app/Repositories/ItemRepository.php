<?php

namespace App\Repositories;
use App\Models\Item;

class ItemRepository
{
    protected $item;

    public function __construct(
        Item $item,
    )
    {
        $this->item = $item;
    }

    public function index()
    {
        $item = $this->item
            ->orderBy('created_at', 'DESC')->get();
            // ->paginate(20);
          
            // ->get();
        return $item;
    }

    public function store($request)
    {
        return $this->item->create($request);
    }

    public function destroy($id)
    {
        return $this->item->findOrFail($id)->delete();
    }

    public function show($id)
    {
        $item = $this->item->findOrFail($id);
        return $item;
    }
}