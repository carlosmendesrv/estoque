@extends('layouts.app')

@section('content')
    {{--    <div class="container">--}}
    {{--        <div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
    {{--            <h1 class="h3 mb-0 text-gray-800">Editar pedido</h1>--}}
    {{--            <a href="{{ route('request.index') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">--}}
    {{--                <i class="fas fa-plus fa-sm text-white-50"></i> Voltar--}}
    {{--            </a>--}}
    {{--        </div>--}}
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Pedidos</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Pedido</li>
                <li class="breadcrumb-item">Editar Pedido</li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2 col-sm-6">
            <div class="card">
                @include('_include._flash-message')
                <form method="POST" action="{{ route('request.update', $request, $items ) }}">
                    @method('PUT')
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

                    <div class="container">
                        <div class="row justify-content-center">
                            <table class="table table-striped table-list">
                                <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Qtd. Caixa</th>
                                    <th scope="col">Sug. Quant</th>
                                    <th scope="col">Status Produto</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->code }} - {{ $item->description }}</td>
                                        <td>

                                            <input type="text" name="lists[{{$item->id}}][box_qtd]"
                                                   value="{{ $item->box_qtd }}"
                                                   class="form-control" id="box_qtd" autofocus required>
                                        </td>
                                        <td>
                                            <input type="text" name="lists[{{$item->id}}][box_suggestion]"
                                                   value="{{ $item->box_suggestion }}" class="form-control"
                                                   id="box_suggestion" autofocus>
                                        </td>
                                        <td>
                                            <select name="lists[{{$item->id}}][status]" class="form-control">
                                                <option>Selecione um Status</option>
                                                <option
                                                    value="0" {{$item->status_product == 0 ?'selected':''}} >
                                                    Verde
                                                </option>
                                                <option
                                                    value="1" {{$item->status_product == 1 ?'selected':''}} >
                                                    Amarelo
                                                </option>
                                                <option
                                                    value="2" {{$item->status_product == 2 ?'selected':''}} >
                                                    Vermelho
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Salvar Pedido</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
