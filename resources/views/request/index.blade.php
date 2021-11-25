@extends('layouts.app')

@section('styles')
    <link href="{{ asset('//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>
            <a href="{{ route('request.create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Novo Pedido
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 offset-1">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Pedidos') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')
                        @if (!count($requests))
                            <h5 class="text-center"> Ops! Não foi localizado nem um pedido.</h5>
                        @else
                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Numero do Pedido</th>
                                        <th scope="col">Loja</th>
                                        <th scope="col">Data de Solicitação</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@$requests as $request)
                                        <tr>
                                            {{-- {{-- <td>{{$product->code}}</td> --}}
                                            <td># {{ $request->id }}</td>
                                            <td>{{ $request->store }}</td>
                                            <td>{{ $request->created_at->format('d/m/Y') }}</td>
                                            <td>Pendente</td>
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
