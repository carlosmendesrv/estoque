@extends('layouts.app')

@section('content')
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Produtos</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Produto</li>
                <li class="breadcrumb-item">Lista</li>
            </ol>
        </div>
    </div>
    <div class="card col-md-6 offset-md-3">
        {{--            <div class="card-body">--}}
        <div class="row">
            <div class="col-md-12" style="text-align-last: right">
                <a href="{{ route('product.create') }}" style="font-size: 15px">
                    <i class="ri-play-list-add-line"></i>&ensp;Novo Produto
                </a>
            </div>
        </div>
        @include('_include._flash-message')
        @if(!count($products))
            <div class="container-fluid text-center">
                <p> Ops! Você ainda não tem produtos cadastrados.</p>
                <br>
                <img width="550vw" height="100%" style="text-align-last: center" class="pt-5"
                     src="{{asset('images/action/empty.svg')}}">
            </div>
        @else
            <table id="myTable" class="table table-hover table-list">
                <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descrição</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach(@$products as $product)
                    <tr>
                        <td>{{$product->code}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <form method="POST"
                                  action="{{ route('product.destroy',[$product->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn p-0">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        {{ $products->links() }}
    </div>

@endsection
