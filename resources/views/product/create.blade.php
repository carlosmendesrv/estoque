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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Novo Produto') }}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        <form method="POST" action="{{route('product.store')}}">
                            @csrf
                            <div class="container">
                                <div class="form-group row">
                                    <label for="code">Codigo</label>
                                    <input type="text" name="code" value="{{ old('code') }}" class="form-control"
                                           id="code" placeholder="001" autofocus required>
                                        
                                </div>

                                <div class="form-group row">
                                    <label for="description">Descrição</label>
                                    <input type="text" name="description" value="{{ old('description') }}" class="form-control"
                                           required>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Produto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection