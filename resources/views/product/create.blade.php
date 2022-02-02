@extends('layouts.app')

@section('content')
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Produtos</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Produtos</li>
                <li class="breadcrumb-item">Novo Produto</li>
            </ol>
        </div>
    </div>
    <div class="row">
        @include('_include._flash-message')
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="card-title">{{ __('Novo Produto') }} </div>
                        </div>
                        <div class="col-md-6" style="text-align-last: right">
                            <a href="{{ route('product.index') }}" style="font-size: 15px">
                                <i class=" ri-arrow-go-back-line"></i>&ensp;Voltar
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('product.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Codigo</label>
                            <div>
                                <input name="code" type="text" class="form-control" required value="{{ old('code') }}"
                                       data-parsley-minlength="6" placeholder="0001"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <div>
                                <input name="description" type="text" class="form-control" required
                                       value="{{ old('description') }}"
                                       data-parsley-minlength="6" placeholder="Min 6 caracteres."/>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit"
                                        class="btn btn-primary waves-effect waves-light mr-1">
                                    Salvar
                                </button>
                                <a class="btn btn-secondary waves-effect" href="{{route('product.index')}}">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
