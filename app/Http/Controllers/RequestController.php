<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRequest;
use App\Repositories\ItemRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RequestRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    protected $repository;
    protected $products;
    protected $stores;
    protected $items;

    public function __construct(
        RequestRepository $repository,
        ProductRepository $products,
        StoreRepository   $store,
        ItemRepository    $items,
    )
    {
        $this->repository = $repository;
        $this->product = $products;
        $this->store = $store;
        $this->items = $items;
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

        return view('request.create', compact('stores', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRequest $request)
    {
        $this->repository->store($request->all());
        return redirect()->route('request.index')->with('success', 'Pedido cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = $id;
        $products = $this->repository->edit($id);
        $items = $this->getProductionStock($products);

        return view('request.show', compact('request', 'items','id'));
    }

    public function getProductionStock($products)
    {
        // dd($this->getStock('6811'));
        // $listStockProduct = DB::connection('pgsql')
        //     ->table('tb_produtoestoque')
        //     ->where('cd_produto', '6811')
        //     ->where('cd_empresa', 1)
        //     ->select('nr_quantidade', 'cd_produto', 'cd_empresa')
        //     ->get();
        
        // dd($this->getStock('6811')->nr_quantidade);
        foreach ($products as $product) {
            $product['stock_qtd'] = $this->getStock($product['code'])->nr_quantidade;
            // dd($product);
            // foreach ($listStockProduct as $stockProduct) {
            //     if ($product->code == $stockProduct->cd_produto) {
            //         $product['stock_qtd'] =  $stockProduct->nr_quantidade;
            //     }
            // }
        }
        // dd($products);
        return $products;
    }

    /**
     * @OA\Get(
     *   tags={"Tag"},
     *   path="Path",
     *   summary="Summary",
     *   @OA\Parameter(ref="#/components/parameters/id"),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getStock($codeProduct)
    {
        return DB::connection('pgsql')
        ->table('tb_produtoestoque')
        ->where('cd_produto', $codeProduct)
        ->where('cd_empresa', 1)
        // ->select('nr_quantidade', 'cd_produto', 'cd_empresa')
        ->select('nr_quantidade')
        ->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = $id;
        $items = $this->repository->edit($id);
        return view('request.edit', compact('request', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect()->route('request.index')->with('success', 'Pedido atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->repository->destroy($id);
        // return redirect()->route('product.index')->with('success', 'Produto deletado com sucesso.');
    }
}
