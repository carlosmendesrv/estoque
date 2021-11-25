@extends('layouts.app')

@section('styles')
    <link href="{{ asset('//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cadastro de Produtos</h1>
            <a href="{{ route('product.create') }}"
               class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Novo Produto
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 offset-1">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Produtos') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')
                        @if(!count($products))
                            <h5 class="text-center"> Ops! Não encontramos um produto cadastrado.</h5>
                        @else
                            <table id="myTable" class="display">
                                <thead>
                                <tr>
                                    <th scope="col">CODIGO</th>
                                    <th scope="col">DESCRIÇÃO</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(@$products as $product)
                                    <tr>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->description}}</td>
            
                                        {{-- <td>
                                            <div class="btn-group">
                                                <form method="POST"
                                                      action="{{ route('product.destroy',[$product->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
            
                </div>
            </div>
     
        </div>
    </div>

    {{-- <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div> --}}
@endsection
