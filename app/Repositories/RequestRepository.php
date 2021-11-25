<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Request;
use Illuminate\Support\Facades\DB;

class RequestRepository
{
    protected $request;
    protected $item;

    public function __construct(
        Request $request,
        ItemRepository $item,
    ) {
        $this->request = $request;
        $this->item = $item;
    }

    public function index()
    {
        $query = $this->request
            ->orderBy('created_at', 'DESC')
            ->get();
        return $query;
    }

    public function store($request)
    {

        $req = $this->request->create([
            'store' => $request['store']
        ]);
        $res = [];
        if(isset($request['lists']))
        {
            foreach($request['lists'] as $item)
            {
                $res[] = $this->item->store([
                    'request_id' => $req->id,
                    'box_qtd' => isset($item['box_qtd']) ? $item['box_qtd'] : 0,
                    'box_suggestion' => isset($item['box_suggestion'])? $item['box_suggestion']: 0,
                    'code' => 0,
                    'invetory_qtd' => 0,
                    'status_product' => 'ok',
                    'status_request' => 'status_request'
                ]);
            }
        }
        dd($res);
    }

    public function destroy($id)
    {
        return $this->request->findOrFail($id)->delete();
    }

    public function show($id)
    {
        $request = $this->request->findOrFail($id);
        return $request;
    }
}
