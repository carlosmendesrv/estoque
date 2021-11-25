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

        dd($request['lists']);
        // box_qt
        // box_suggestion
        $data = array();
        foreach($request['lists'] as $key => $value){
            dd($key['box_qt'][1]);
        }
        dd($data);
        // foreach($request as $key => $value){
        //     dump($key);


        // $this->request->create($store);
        // dd($store);
        // dd($store);
        // DB::transaction(function ($request) {

        // $lists['box_qt']  = $request['box_qt'];
        // $lists['box_suggestion'] = $request['box_suggestion'];



        // foreach ($lists as $key => $value) {
        //     dd($key);
        //     dd($key, $value['1']);
        // }



        return $this->request->create($request);
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
