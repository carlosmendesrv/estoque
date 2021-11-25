@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cadastro de Produtos</h1>
            <a href="{{ route('product.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Voltar
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="container">
                <div class="col-md-8 offset-md-2 col-sm-6">
                    <div class="card">
                        <div class="card-header">{{ __('Novo Produto') }}</div>
                        <div class="card-body">
                            @include('_include._flash-message')
                            <p>Numero do Pedido: #001</p>
                            <form method="POST" action="{{ route('product.store') }}">
                                @csrf
                                <div class="container">
                                    {{-- <div class="row justify-content-center"> --}}
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Codigo</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col">Qtd. Caixa</th>
                                                <th scope="col">Sug. Quant</th>
                                                <th scope="col">Status Produto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->code }}</td>
                                                    <td> {{ $product->description }}</td>
                                                    <td>
                                                        <input type="text" name="box_qtd" value="{{ old('box_qtd') }}"
                                                            class="form-control" id="box_qtd" autofocus required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="cbox_suggestionode"
                                                            value="{{ old('box_suggestion') }}" class="form-control"
                                                            id="box_suggestion" autofocus>
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option selected>Selecione um status</option>
                                                            <option>Verde</option>
                                                            <option>Amarelo</option>
                                                            <option>Vermelho</option>
                                                        </select>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Salvar Produto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
