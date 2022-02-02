@extends('layouts.app')

@section('content')
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Pedidos</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Pedido</li>
                <li class="breadcrumb-item">Novo Pedido</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('_include._flash-message')
                <form method="POST" action="{{ route('request.store') }}">
                    <input type="hidden" name="status" value="P">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <button type="submit" class="btn" style="color: #5664d2"><i class="ri-save-3-line"></i>
                                Salvar
                            </button>
                        </div>
                        <div class="form-group col-6 align-right">
                            <a href="{{ route('request.index') }}" class="btn" style="color: #5664d2">
                                <i class=" ri-arrow-go-back-line"></i>&ensp;Voltar
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select name="store" class="form-control">
                                <option selected disabled> Selecione uma loja</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped table-list">
                        <thead>
                        <tr>
                            {{--                                <th scope="col">Codigo</th>--}}
                            <th scope="col">Descrição</th>
                            <th scope="col">Caixas</th>
                            <th scope="col">Sugestão</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <div class="row">
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->code }} - {{ $product->description }}</td>
                                    <td>
                                        <input type="hidden" name="lists[{{$product->id}}][code]"
                                               value="{{ $product->code  }}" class="form-control"
                                               id="box_qtd" autofocus>
                                        <input type="hidden" name="lists[{{$product->id}}][description]"
                                               value="{{ $product->description }}" class="form-control "
                                               id="description" autofocus>

                                        <input type="number" name="lists[{{$product->id}}][box_qtd]"
                                               value="{{ old('box_qtd') }}" class="form-control input-resize"
                                               id="box_qtd" autofocus>
                                    </td>
                                    <td class="td-center">
                                        <input type="number" name="lists[{{$product->id}}][box_suggestion]"
                                               value="{{ old('box_suggestion') }}" class="form-control input-resize"
                                               id="box_suggestion" autofocus>
                                    </td>
                                    <td>
                                        <select name="lists[{{$product->id}}][status]"
                                                class="form-control input-resize">
                                            <option value="0">Selecione</option>
                                            <option value="0">Verde</option>
                                            <option value="1">Amarelo</option>
                                            <option value="2">Vermelho</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </div>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary col-sm-12 col-md-2">Salvar Produto</button>
                </form>
                {{--                </div>--}}
            </div>
        </div>
@endsection
