@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Regras</h3>
                <p class="text-muted">Todas as regras</p>
                <div class="form-inline padding-bottom-15">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="{{ url('dashboard/roles/create') }}" class="btn btn-outline btn-primary btn-sm">Add new</a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('flash::message')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Usuário usando</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td><span class="label label-warning">{{ $role->users->count() }}</span></td>

                                <td class="text-nowrap">
                                    <div class="row">
                                        <a href="{{ url('dashboard/roles/' . $role->id . '/edit') }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                        {!! Form::open(['url' => 'dashboard/roles/' . $role->id, 'method' => 'DELETE']) !!}
                                        <a href="#" data-toggle="tooltip" data-original-title="Deletar" onclick="$(this).closest('form').submit();"> <i class="fa fa-close text-danger"></i> </a>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
