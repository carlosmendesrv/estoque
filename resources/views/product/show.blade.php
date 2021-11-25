@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Senhas</h1>
            <a href="{{ route('group.key.index',$group) }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Voltar
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{$key->title}}</div>
                    <div class="card-body">
                        @include('_include._flash-message')

                        <form method="POST" action="{{route('group.key.store',$group)}}">
                            @csrf
                            <div class="container">
                                <table class="table table-borderless">
                                    <thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Titulo</th>
                                        <td>{{$key->title}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Usuario</th>
                                        <td>{{$key->username}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Senha</th>
                                        <td>{{$key->password}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Categoria</th>
                                        <td>{{$key->category->name}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">url</th>
                                        <td>{{$key->url}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Anotação</th>
                                        <td>{{$key->notes}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>{{$key->is_private ? 'Privado': 'Publica' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection