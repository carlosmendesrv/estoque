@extends('layouts.app')

@section('content')
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Pedidos</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Pedido</li>
                <li class="breadcrumb-item">Pedido {{$request}}</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('_include._flash-message')
                <div class="row">
                    <form method="POST" action="{{ route('request.update', $request) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group col-md-12 col-sm-6">
                            <a class="btn" style="color: #5664d2"
                               href="{{route('request.edit',$id)}}"><i class="ri-edit-box-fill"></i> Editar</a>
                            </td>

                            <button type="submit" class="btn" name="status" value="F" style="color: darkgreen"><i
                                    class="ri-checkbox-circle-fill"></i>
                                Fechar
                            </button>
                            <button type="submit" class="btn" name="status" value="C" style="color: darkred"><i
                                    class=" ri-delete-back-line"></i>
                                Cancelar
                            </button>

                            <a href="{{ route('request.index') }}" class="btn align-right" style="color: #5664d2">
                                <i class=" ri-arrow-go-back-line"></i>&ensp;Voltar
                            </a>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <table class="table table-striped table-list td-center">
                            <thead>
                            <tr>
                                {{--                                <th scope="col">Codigo</th>--}}
                                <th scope="col">Descrição</th>
                                <th scope="col">Caixa</th>
                                <th scope="col">Sugestão</th>
                                <th scope="col">Estoque</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            {{--                            <form method="POST" action="{{ route('request.update', $request) }}">--}}
                            {{--                                @method('PUT')--}}
                            {{--                                @csrf--}}

                            {{--                            </form>--}}
                            <tbody>

                            @foreach ($items as $item)
                                @if( $item->box_qtd > 0 || $item->box_suggestion > 0  )
                                    <tr>
                                        <td>{{ $item->code }} - {{ $item->description }}</td>
                                        <td class="text-center">{{ $item->box_qtd }} </td>
                                        <td class="text-center">{{ $item->box_suggestion }} </td>
                                        <td class="text-center">{{ number_format($item->stock_qtd,2,",",".")   }} </td>

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
