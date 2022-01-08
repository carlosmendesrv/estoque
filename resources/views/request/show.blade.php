@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lista de Pedidos</h1>
            <a href="{{ route('request.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Voltar
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Numero do Pedido: {{$request}}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        <div class="container">
                            <div class="row justify-content-center">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Qtd. Caixa</th>
                                        <th scope="col">Sug. Quant</th>
                                        <th scope="col">Estoque</th>
                                        <th scope="col">Status Produto</th>
                                    </tr>
                                    </thead>
                                    <form method="POST" action="{{ route('request.update', $request) }}">
                                        @method('PUT')
                                        @csrf
{{--                                        P - Pendente--}}
{{--                                        F - Fechado--}}
{{--                                        C - Cancelado--}}
                                        <button type="submit" name="status" value="F" class="btn btn-primary">Concluir Pedido</button>
                                        <button type="submit" name="status" value="C" class="btn btn-danger">Cancelar Pedido</button>
                                    </form>
                                        <tbody>

                                        @foreach ($items as $item)
                                            @if( $item->box_qtd > 0 || $item->box_suggestion > 0  )
                                                <tr>
                                                    <td>{{ $item->code }}</td>
                                                    <td> {{ $item->description }}</td>
                                                    <td>{{ $item->box_qtd }} </td>
                                                    <td>{{ $item->box_suggestion }} </td>
                                                    <td>{{ number_format($item->stock_qtd,2,",",".")   }} </td>

                                                    <td>
                                                        {{$item->status_product == 0 ?'Verde':''}}
                                                        {{$item->status_product == 1 ?'Amarelo':''}}
                                                        {{$item->status_product == 2 ?'Vermelho':''}}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
