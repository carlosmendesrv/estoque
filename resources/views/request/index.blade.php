@extends('layouts.app')

@section('content')

    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Pedidos</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-2">
                <li class="breadcrumb-item active">Pedidos</li>
                <li class="breadcrumb-item">Lista</li>
            </ol>
        </div>
    </div>

    <div class="row">
            <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">{{ __('Lista de Pedidos') }} </div>
                    </div>
                    <div class="col-md-6" style="text-align-last: right">
                        <a href="{{ route('request.create') }}" style="font-size: 15px">
                            <i class="ri-play-list-add-line"></i>&ensp;Novo pedido
                        </a>
                    </div>
                </div>
                @include('_include._flash-message')
                @if(!count($requests))
                    <div class="container-fluid text-center">
                        <p> Ops! Você ainda não tem pedido cadastrados.</p>
                        <br>
                        <img width="550vw" height="100%" style="text-align-last: center" class="pt-5"
                             src="{{asset('images/action/empty.svg')}}">
                    </div>
                @else
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Pedido</th>
                            <th scope="col">Loja</th>
                            <th scope="col" class="d-sm-none d-md-block">Solicitado</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (@$requests as $request)
                            <tr href="{{route('request.show',$request->id)}}">
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->store }}</td>
                                <td class="d-sm-none d-md-block">{{ $request->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @switch( $request->status)
                                        @case('C')
                                        Cancelado
                                        @break
                                        @case('F')
                                        Concluido
                                        @break
                                        @default
                                        Pendente
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {!! $requests->links() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('table tr').click(function() {
                window.location = $(this).attr('href');
                return false;
            });
        });
    </script>
@endsection
