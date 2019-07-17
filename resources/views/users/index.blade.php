@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <h1 class="panel-heading">Colaborador<a class="pull-right btn btn-sm btn-info" href="/register">Nuevo Colaborador</a></h1>
        <div class="panel-body">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>%</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->porcent_id }}</td>
                        <td width="17%">
                            <form action="">
                                <!-- <a class="btn btn-sm btn-default">Ver</a> -->
                                <a href="{{ route('user.edit',$users->id) }}" class="btn btn-sm btn-default">Editar</a>
                                <!-- <a class="btn btn-sm btn-default">Eliminar</a> -->
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
        <div class="panel-footer">
            miguekos1233@gmail.com
        </div>
    </div>
@endsection
