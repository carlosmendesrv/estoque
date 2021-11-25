<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\RequestRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    protected $repository;
    protected $products;
    protected $stores;

    public function __construct(
     RequestRepository $repository,
     ProductRepository $products,
     StoreRepository $store,
     )
    {
        $this->repository = $repository;
        $this->product = $products;
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = $this->repository->index();
        return view('request.index', compact('requests',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->store->index();
        $products = $this->product->index();
        return view('request.create',compact('stores','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->repository->store($request->all());
        return redirect()->route('request.index')->with('success', 'Pedido cadastrado com sucesso.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->repository->destroy($id);
        // return redirect()->route('product.index')->with('success', 'Produto deletado com sucesso.');
    }
}
